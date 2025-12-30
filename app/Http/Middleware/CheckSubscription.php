<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    public function handle(Request $request, Closure $next, $plan = null)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Check if user has required plan
        if ($plan === 'premium' && !$user->isPremium()) {
            return redirect()->route('subscription.plans')->with('error', 'Upgrade ke premium untuk akses fitur ini!');
        }

        if ($plan === 'starter_plus' && !$user->isStarterPlus()) {
            return redirect()->route('subscription.plans')->with('error', 'Upgrade ke Starter+ untuk akses AI Chat!');
        }

        return $next($request);
    }
}
