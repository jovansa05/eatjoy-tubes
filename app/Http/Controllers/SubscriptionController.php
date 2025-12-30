<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Services\MidtransService;
use Midtrans\Snap;
use Illuminate\Support\Str;


class SubscriptionController extends Controller
{
    public function showPlans()
    {
        return view('subscription.plans');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:free,starter,starter_plus',
        ]);

        $user = Auth::user();

        // Update user subscription
        $user->update([
            'subscription_plan' => $request->plan,
            'subscription_ends_at' => $request->plan === 'free' ? null : now()->addMonth(),
        ]);

        // Redirect ke dashboard yang sesuai
        if ($request->plan === 'starter') {
            return redirect()->route('dashboard.premium.starter')->with('success', 'Berlangganan Starter berhasil!');
        } elseif ($request->plan === 'starter_plus') {
            return redirect()->route('dashboard.premium.starter.plus')->with('success', 'Berlangganan Starter+ berhasil!');
        } else {
            return redirect()->route('dashboard.user')->with('success', 'Kembali ke paket Free');
        }
    }

    public function payRedirect(Request $request)
    {
    $request->validate([
        'plan' => 'required|in:starter,starter_plus',
    ]);

    $user = Auth::user();

    $prices = [
        'starter' => 14900,
        'starter_plus' => 31500,
    ];

    $amount = $prices[$request->plan];

    $orderId = 'SUBS-' . $user->id . '-' . now()->format('YmdHis') . '-' . Str::random(5);

    // simpan dulu transaksi pending
    $payment = Payment::create([
        'user_id' => $user->id,
        'order_id' => $orderId,
        'plan' => $request->plan,
        'amount' => $amount,
        'status' => 'pending',
    ]);

    MidtransService::init();

    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => (int) $amount,
        ],
        'item_details' => [[
            'id' => $request->plan,
            'price' => (int) $amount,
            'quantity' => 1,
            'name' => $request->plan === 'starter'
                ? 'EatJoy Starter (1 Bulan)'
                : 'EatJoy Starter+ (3 Bulan)',
        ]],
        'customer_details' => [
            'first_name' => $user->nickname ?? $user->username,
            'email' => $user->email,
        ],
    ];

    // ini yang menghasilkan redirect_url
    $trx = Snap::createTransaction($params);

    return redirect()->away($trx->redirect_url);
    }

    public function finish(Request $request)
    {
    // Jangan langsung set paid dari sini.
    // Ini cuma halaman “kami sedang memproses pembayaran”.
    return view('subscription.finish');
    }

}
