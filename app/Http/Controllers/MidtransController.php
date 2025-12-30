<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;
use Midtrans\Snap;

// contoh: ganti ini ke model Order kamu
use App\Models\Order;

class MidtransController extends Controller
{
    public function token(Request $request)
    {
        $request->validate([
            'order_id' => ['required'],
        ]);

        // 1) Ambil order dari DB (JANGAN percaya total dari frontend)
        $order = Order::where('id', $request->order_id)->firstOrFail();

        // Pastikan order_id yang kamu kirim ke Midtrans itu unik (biasanya pakai kode invoice)
        $midtransOrderId = $order->invoice_number; // contoh

        MidtransService::init();

        // 2) Susun parameter Snap
        $params = [
            'transaction_details' => [
                'order_id' => (string) $midtransOrderId,
                'gross_amount' => (int) $order->grand_total, // IDR integer
            ],
            // recommended: kirim item_details biar tercatat di dashboard
            // (pastikan jumlah item_details == gross_amount)
            'item_details' => $order->items->map(function ($item) {
                return [
                    'id' => (string) $item->sku,
                    'price' => (int) $item->price,
                    'quantity' => (int) $item->qty,
                    'name' => substr((string) $item->name, 0, 50),
                ];
            })->values()->toArray(),
            'customer_details' => [
                'first_name' => $order->customer_first_name,
                'last_name'  => $order->customer_last_name,
                'email'      => $order->customer_email,
                'phone'      => $order->customer_phone,
            ],
        ];

        // 3) Generate snap token
        $snapToken = Snap::getSnapToken($params);

        // (opsional) simpan token / midtrans_order_id di DB untuk audit
        // $order->midtrans_order_id = $midtransOrderId;
        // $order->save();

        return response()->json([
            'token' => $snapToken,
        ]);
    }
}
