<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStarterPlus
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || $user->subscription_plan !== 'starter_plus') {
            return response()->json([
                'success' => false,
                'message' => 'Fitur ini hanya tersedia untuk paket Starter+'
            ], 403);
        }

        return $next($request);
    }
}
