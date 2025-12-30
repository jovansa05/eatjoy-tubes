<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;
use Midtrans\Transaction;

// contoh: ganti ke model Order kamu
use App\Models\Order;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();

        // 1) Verifikasi signature_key (direkomendasikan Midtrans)
        $serverKey = config('midtrans.server_key');
        $orderId = $payload['order_id'] ?? '';
        $statusCode = $payload['status_code'] ?? '';
        $grossAmount = $payload['gross_amount'] ?? '';
        $signatureKey = $payload['signature_key'] ?? '';

        $expectedSignature = hash('sha512', $orderId.$statusCode.$grossAmount.$serverKey);

        if ($signatureKey !== $expectedSignature) {
            // abaikan kalau bukan notifikasi valid
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // 2) (Opsional tapi bagus) Challenge ke Midtrans: ambil status resmi via Get Status API
        MidtransService::init();
        $status = Transaction::status($orderId);

        $transactionStatus = $status->transaction_status ?? null;
        $fraudStatus = $status->fraud_status ?? null;

        // 3) Update order kamu secara idempotent
        $order = Order::where('invoice_number', $orderId)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Mapping status umum:
        // settlement / capture(accept) => PAID
        // pending => MENUNGGU
        // expire/cancel/deny => GAGAL
        if ($transactionStatus === 'capture') {
            if ($fraudStatus === 'accept') {
                $order->payment_status = 'paid';
            } elseif ($fraudStatus === 'challenge') {
                $order->payment_status = 'challenge';
            }
        } elseif ($transactionStatus === 'settlement') {
            $order->payment_status = 'paid';
        } elseif ($transactionStatus === 'pending') {
            $order->payment_status = 'pending';
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'], true)) {
            $order->payment_status = 'failed';
        }

        // simpan raw response kalau perlu audit
        $order->midtrans_payload = json_encode($payload);
        $order->save();

        return response()->json(['message' => 'OK']);
    }
}
