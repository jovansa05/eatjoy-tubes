<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class SubscriptionController extends Controller
{
    private function midtransConfig(): void
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = false; // Sandbox
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }

    public function plans()
    {
        $plans = [
            'starter'      => ['name' => 'Starter', 'price' => 49000],
            'starter_plus' => ['name' => 'Starter Plus', 'price' => 99000],
        ];

        return view('subscription.plans', compact('plans'));
    }

    public function subscribeFree(Request $request)
    {
        $user = Auth::user();
        $user->subscription_plan = 'free';
        $user->save();

        return redirect()->route('dashboard.user')->with('success', 'Kamu sekarang menggunakan paket Free.');
    }

    public function checkout($plan)
    {
        $user = Auth::user();

        $plans = [
            'starter'      => ['name' => 'Starter', 'price' => 9900],
            'starter_plus' => ['name' => 'Starter Plus', 'price' => 24900],
        ];

        abort_unless(isset($plans[$plan]), 404);

        $this->midtransConfig();

        $orderId = 'EATJOY-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(6));
        $grossAmount = $plans[$plan]['price'];

        $order = SubscriptionOrder::create([
            'order_id'      => $orderId,
            'user_id'       => $user->id,
            'plan'          => $plan,
            'gross_amount'  => $grossAmount,
            'status'        => 'created',
        ]);

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $user->nickname ?? $user->username,
                'email'      => $user->email,
            ],
            'item_details' => [
                [
                    'id'       => $plan,
                    'price'    => $grossAmount,
                    'quantity' => 1,
                    'name'     => 'EatJoy ' . $plans[$plan]['name'],
                ]
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $order->update([
            'snap_token' => $snapToken,
            'status'     => 'pending',
        ]);

        return view('subscription.checkout', [
            'snapToken' => $snapToken,
            'plan'      => $plan,
            'price'     => $grossAmount,
        ]);
    }

    /**
     * DEMO MODE:
     * Dipanggil dari checkout.blade.php supaya user langsung jadi premium tanpa scan QR.
     */
    public function demoActivate(Request $request)
    {
        $request->validate([
            'plan'     => 'required|string',
            'order_id' => 'nullable|string',
            'status'   => 'nullable|string',
        ]);

        $plan = $request->input('plan');
        if ($plan === 'starterplus') $plan = 'starter_plus';

        if (!in_array($plan, ['starter', 'starter_plus'], true)) {
            return response()->json(['ok' => false, 'message' => 'Plan tidak valid'], 422);
        }

        $user = Auth::user();

        // Durasi: starter 1 bulan, starter_plus 3 bulan
        $endAt = now()->addMonth();
        if ($plan === 'starter_plus') {
            $endAt = now()->addMonths(3);
        }

        // Ini kolom kamu sudah pakai (untuk free), jadi aman
        $user->subscription_plan = $plan;

        // Set tanggal expired kalau kolomnya ada (biar middleware kamu makin gampang)
        foreach (['subscription_ends_at', 'subscription_end_at', 'subscription_expires_at', 'subscription_expired_at'] as $col) {
            if (Schema::hasColumn('users', $col)) {
                $user->{$col} = $endAt;
                break;
            }
        }

        $user->save();

        // Optional update order status (kalau order_id dikirim)
        if ($request->filled('order_id')) {
            SubscriptionOrder::where('order_id', $request->order_id)
                ->where('user_id', $user->id)
                ->update([
                    'status' => $request->input('status', 'demo'),
                ]);
        }

        return response()->json([
            'ok' => true,
            'redirect' => route('dashboard.user'),
        ]);
    }
}
