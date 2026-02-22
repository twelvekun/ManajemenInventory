<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        if (!$request->user()->can($permission)) {
            abort(403, 'Anda tidak memiliki permission untuk aksi ini.');
        }

        return $next($request);
    }
}
