<?php

use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        try {
            $exceptions->renderable(function (HttpException $e) {
                try {
                    $statusCode = $e->getStatusCode();
                    $errorMessage = Response::$statusTexts[$statusCode];

                    return response()->view('errors.error', [
                        'statusCode' => $statusCode,
                        'errorMessage' => $errorMessage
                    ], $statusCode);
                } catch (\Throwable $th) {
                    return redirect(route('index'));
                }
            });
        } catch (\Throwable $th) {
            return redirect(route('index'));
        }
    })->create();
