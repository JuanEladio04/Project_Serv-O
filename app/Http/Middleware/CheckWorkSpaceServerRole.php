<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckWorkSpaceServerRole
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
            $workSpace = $server->workSpace;
            $role = Auth::user()->workSpaces->find($workSpace->id)->pivot->wk_role;

            if ($role == 'creator' || $role == 'editor') {
                return $next($request);
            }
            return redirect(route('server.show', $request->route('server')));
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
