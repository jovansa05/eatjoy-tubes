<button id="pay-button" type="button">Bayar Sekarang</button>

<script
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>
document.getElementById('pay-button').addEventListener('click', async () => {
  const orderId = "{{ $order->id }}";

  const resp = await fetch("/api/midtrans/token", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ order_id: orderId })
  });

  const data = await resp.json();

  window.snap.pay(data.token, {
    onSuccess: function(result) {
      console.log("SUCCESS", result);
      // UX saja (tampilkan sukses). Status final tetap dari webhook.
    },
    onPending: function(result) {
      console.log("PENDING", result);
    },
    onError: function(result) {
      console.log("ERROR", result);
    },
    onClose: function() {
      console.log("Customer menutup popup");
    }
  });
});
</script>
