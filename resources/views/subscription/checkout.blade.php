<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout - EatJoy</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <style>
        :root {
            --gradient: linear-gradient(135deg, #6C63FF 0%, #4A90E2 100%);
            --card-shadow: 0 20px 40px rgba(108, 99, 255, 0.12);
        }
        * { font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg, #f5f7ff 0%, #f0f2ff 100%); min-height: 100vh; padding: 40px 0; }
        .card { border: none; border-radius: 18px; box-shadow: var(--card-shadow); overflow: hidden; }
        .card-header { background: var(--gradient); color: white; padding: 24px; border: none; }

        .btn-pay {
            background: var(--gradient);
            color: white;
            border: none;
            height: 52px;
            border-radius: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }

        .btn-done {
            background: #198754;
            color: #fff;
            border: none;
            height: 52px;
            border-radius: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }
        .hidden { display:none !important; }
        .meta-row { display:flex; justify-content:space-between; gap:12px; flex-wrap:wrap; }
        .meta { background:#F8F9FF; border-radius:12px; padding:14px 16px; flex:1; min-width:160px; }
        .badge-plan { background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.25); padding: 6px 10px; border-radius: 999px; font-weight: 600; }
        .note { font-size: 0.92rem; color:#666; }
    </style>
</head>

<body>
@php
    // Normalisasi nama plan (biar konsisten)
    $normalizedPlan = $plan === 'starterplus' ? 'starter_plus' : $plan;

    // Route dashboard sesuai plan (SESUIAI web.php kamu)
    $dashboardUrl = $normalizedPlan === 'starter'
        ? route('dashboard.premium.starter')
        : ($normalizedPlan === 'starter_plus'
            ? route('dashboard.premium.starter.plus')
            : route('dashboard.user'));

    // Endpoint demo activate
    $activateUrl = route('subscription.demo.activate');
@endphp


<div class="container" style="max-width: 820px;">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <h3 class="mb-1 fw-bold">Checkout Premium</h3>
                    <div class="opacity-90">Selesaikan pembayaran untuk mengaktifkan paket kamu.</div>
                </div>
                <div class="badge-plan">
                    {{ strtoupper(str_replace('_', ' ', $normalizedPlan)) }}
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="meta-row mb-4">
                <div class="meta">
                    <small>Paket</small><br>
                    <strong>{{ strtoupper(str_replace('_', ' ', $normalizedPlan)) }}</strong>
                </div>
                <div class="meta">
                    <small>Total</small><br>
                    <strong>Rp {{ number_format($price, 0, ',', '.') }}</strong>
                </div>
                <div class="meta">
                    <small>Status</small><br>
                    <strong id="statusText">Menunggu Pembayaran</strong>
                </div>
            </div>

            <button id="pay-button" class="btn-pay">
                <i class="bi bi-credit-card-2-front"></i>
                Bayar Sekarang (Midtrans)
            </button>

            {{-- Tombol demo untuk bypass QR dummy --}}
            <button id="done-button" class="btn-done mt-3 hidden" type="button">
                <i class="bi bi-check2-circle"></i>
                Selesai
            </button>

            <div class="mt-3 note">
                <i class="bi bi-info-circle"></i>
                Ini demo sandbox. Setelah pilih metode pembayaran, kamu bisa klik <b>Selesai</b> untuk lanjut ke dashboard premium.
            </div>

            <div class="mt-4">
                <a href="{{ route('subscription.plans') }}" class="text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Kembali ke Paket
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    const payBtn = document.getElementById('pay-button');
    const doneBtn = document.getElementById('done-button');
    const statusText = document.getElementById('statusText');

    const SNAP_TOKEN = @json($snapToken);
    const PLAN = @json($normalizedPlan);
    const DASHBOARD_URL = @json($dashboardUrl);
    const ACTIVATE_URL = @json($activateUrl);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function showDone() {
        doneBtn.classList.remove('hidden');
    }

    async function activateAndRedirect(label, result = null) {
        statusText.textContent = label;

        // 1) AKTIFKAN SUBSCRIPTION di backend (ini yang bikin middleware ngizinin)
        try {
            await fetch(ACTIVATE_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({
                    plan: PLAN,
                    order_id: result?.order_id || null,
                    status: result?.transaction_status || label
                })
            });
        } catch (e) {
            console.warn("activate demo failed:", e);
            // tetap lanjut redirect, tapi kalau middleware ketat, kamu harus benerin backend-nya.
        }

        // 2) REDIRECT KE DASHBOARD PREMIUM
        window.location.href = DASHBOARD_URL;
    }

    payBtn.addEventListener('click', function () {
        showDone();

        window.snap.pay(SNAP_TOKEN, {
            onSuccess: function (result) {
                activateAndRedirect("Pembayaran Berhasil", result);
            },
            onPending: function (result) {
                // kunci demo: pending dianggap selesai
                activateAndRedirect("Pembayaran Tercatat (Demo)", result);
            },
            onError: function () {
                alert("Pembayaran gagal. Coba lagi ya.");
                statusText.textContent = "Gagal";
            },
            onClose: function () {
                statusText.textContent = "Popup ditutup (Demo)";
                showDone();
            }
        });
    });

    doneBtn.addEventListener('click', function () {
        // bypass manual untuk demo
        activateAndRedirect("Selesai (Demo)", null);
    });
</script>

</body>
</html>
