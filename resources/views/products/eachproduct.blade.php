<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loose Fit Hoodie - Product Details</title>
   <link rel="stylesheet" href="{{ asset('css/each.products.css') }}">
</head>
<body>
    <div class="container">
        <!-- Product Image Section -->
        <div class="product-image-section">
            <div class="main-image-container">
                 <img src="{{ asset($product->image ) }}"  alt="Front view" class="thumbnail" onclick="changeMainImage(this)">
            </div>

            <!-- Thumbnail Gallery -->
            <div class="thumbnail-gallery">
                  <img src="{{ asset($product->image) }}"  alt="Front view" class="thumbnail" onclick="changeMainImage(this)">
                <img src="{{ asset($product->image) }}"  alt="Back view" class="thumbnail" onclick="changeMainImage(this)">
                <img src="{{ asset($product->image) }}"  alt="Detail view" class="thumbnail" onclick="changeMainImage(this)">
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="product-details-section">
            <div class="breadcrumb">
                <span>Best Products</span>
            </div>

          <h3 class="product-name">{{ $product->name }}</h3>
             <div class="product-price">${{ number_format($product->price, 2) }}</div>

            <!-- Order Deadline -->
            <div class="order-info">
                <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <span>Order by 03:30:26 to get next day delivery</span>
            </div>

            <!-- Size Selector -->
            <div class="size-section">
                <label>Select Size</label>
                <div class="size-options">
                    <button class="size-btn active">S</button>
                    <button class="size-btn">M</button>
                    <button class="size-btn">L</button>
                    <button class="size-btn">XL</button>
                    <button class="size-btn">XXL</button>
                </div>
            </div>

            <!-- Add to Cart Button -->
            <form action="{{ route('addtocard', $product->id) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>

            <!-- Description & Fit Section -->
            <div class="collapsible-section">
                <button class="collapsible-header" onclick="toggleSection(this)">
                    <span>Description & Fit</span>
                    <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="collapsible-content">
                    <p>{{ $product->description ?? 'No description available.' }}</p>
                </div>
            </div>

            <!-- Shipping Section -->
            <div class="collapsible-section">
                <button class="collapsible-header" onclick="toggleSection(this)">
                    <span>Shipping</span>
                    <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="collapsible-content">
                    <div class="shipping-grid">
                        <div class="shipping-item">
                            <svg class="shipping-icon" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                            <div>
                                <p class="label">Discount</p>
                                <p class="value">Disc 50%</p>
                            </div>
                        </div>
                        <div class="shipping-item">
                            <svg class="shipping-icon" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                            <div>
                                <p class="label">Package</p>
                                <p class="value">Regular Package</p>
                            </div>
                        </div>
                        <div class="shipping-item">
                            <svg class="shipping-icon" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                            <div>
                                <p class="label">Delivery Time</p>
                                <p class="value">3-4 Working Days</p>
                            </div>
                        </div>
                        <div class="shipping-item">
                            <svg class="shipping-icon" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                            <div>
                                <p class="label">Expiration Date</p>
                                <p class="value">10-12 October 2027</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSection(header) {
            const content = header.nextElementSibling;
            const chevron = header.querySelector('.chevron');

            if (content.style.display === 'block') {
                content.style.display = 'none';
                chevron.style.transform = 'rotate(0deg)';
            } else {
                content.style.display = 'block';
                chevron.style.transform = 'rotate(180deg)';
            }
        }

        function changeMainImage(thumbnail) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = thumbnail.src;
        }

        // Size button selection
        document.querySelectorAll('.size-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
