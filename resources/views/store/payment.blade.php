<h1>Pilih Metode Pembayaran dari {{ $payment_id }}</h1>
<form action="/payment/update/{{ $payment_id }}" method="POST">
      @csrf
      @method('put')
      <select name="payment_method" id="payment_method" class="form-control">
            <option value="credit_card">Credit Card</option>
            <option value="bank_transfer">Bank Transfer</option>
            <option value="cash_on_delivery">Cash on Delivery</option>
      </select>
      <button type="submit" class="btn btn-primary mt-3">Pilih Metode Pembayaran</button>
</form>
