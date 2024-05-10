<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckWorkSpaceServer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $server = Server::find($request->route('server'));
            $workspace = $server->workSpace;
            if (Auth::user()->workSpaces->contains($workspace)) {
                return $next($request);
            }
            return redirect('/');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
