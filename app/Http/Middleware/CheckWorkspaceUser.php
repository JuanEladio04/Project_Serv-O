<?php

namespace App\Http\Middleware;

use App\Models\WorkSpace;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckWorkSpaceUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $workspace = WorkSpace::find($request->route('workSpace'));
            if (Auth::user()->workSpaces->contains($workspace)) {
                return $next($request);
            }

            return redirect('/');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
