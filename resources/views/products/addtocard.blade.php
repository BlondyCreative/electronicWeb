<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Bag - Shopping Cart</title>
   <link rel="stylesheet" href="{{ asset('css/newpage.css') }}">
</head>
<body>
  <div class="container">
    <h1 class="page-title">My Bag</h1>
@if($cart && $cart->items->count() > 0)
<div class="shopping-bag-wrapper">
    <div class="cart-items">
        @foreach($cart->items as $item)
        <div class="cart-item">
            <div class="item-image">
                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}">
            </div>
            <div class="item-details">
                <h3 class="product-name">{{ $item->product->name }}</h3>
                <p class="item-specs">Medium, Black</p>
                <div class="item-price">${{ number_format($item->product->price, 2) }}</div>
            </div>
             <div class="item-controls">
<form action="{{ route('cart.update', $item->product->id) }}" method="POST" class="auto-update-form">
    @csrf
    <div class="item-controls">
        <button type="button" class="qty-btn">-</button>
        <input type="number" name="qty" value="{{ $item->qty }}" min="1" class="qty-input">
        <button type="button" class="qty-btn">+</button>
    </div>

    
</form>
            </div>
        </div>
        @endforeach
    </div>

<script>
document.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const input = this.parentElement.querySelector('.qty-input');
        let current = parseInt(input.value);

        if (this.textContent === '+') {
            input.value = current + 1;
        } else if (this.textContent === '-' && current > 1) {
            input.value = current - 1;
        }

        setTimeout(() => {
            input.dispatchEvent(new Event('change'));
        }, 100);
    });
});

document.querySelectorAll('.qty-input').forEach(input => {
    input.addEventListener('change', function () {
        this.closest('form').submit();
    });
});
</script>



      <!-- Summary Panel -->
      <div class="summary-panel">
        <div class="summary-row">
          <span class="summary-label">Tax</span>
          <span class="summary-value">$103.07</span>
        </div>
        <div class="summary-row">
          <span class="summary-label">Discount</span>
          <span class="summary-value discount">−$93</span>
        </div>
        <div class="summary-row total">
          <span class="summary-label">Total</span>
          <span class="summary-value">$217.99</span>
        </div>
        <button class="checkout-btn">Checkout</button>
      </div>
    </div>
  </div>
   @endif
</body>
</html>
