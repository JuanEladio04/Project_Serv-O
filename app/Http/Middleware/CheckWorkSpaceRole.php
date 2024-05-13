<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\WorkSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckWorkSpaceRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $workSpace = WorkSpace::find($request->route('workSpace'));
            $role = Auth::user()->workSpaces->find($workSpace->id)->pivot->wk_role;
    
            if ($role == 'creator' || $role == 'editor') {
                return $next($request);
            }
            return redirect(route('workSpace.show', $request->route('workSpace')));
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
