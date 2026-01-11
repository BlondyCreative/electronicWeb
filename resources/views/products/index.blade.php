@extends('layouts.app')

@section('content')
   <header class="header">
        <div class="header-container">
            <div class="logo">Shofio</div>
              <form action="{{ route('images.search') }}" method="GET">
            <div class="search-bar">
                <input type="text" name='q' placeholder="Search on Shofio" class="search-input">
                <button class="search-btn">Search</button>
            </div>
            </form>
            <div class="header-icons">
<a href="{{ route('cart.show') }}">
    <span class="icon">🛒</span>
</a>

            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Shofio</h1>
            <p class="hero-subtitle">Give All You Need</p>
        </div>
    </section>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title">Category</h3>
                <ul class="category-list">
                    <li><a href="#" class="category-link active">All Products</a></li>
                    <li><a href="#" class="category-link">For Home</a></li>
                    <li><a href="#" class="category-link">For Music</a></li>
                    <li><a href="#" class="category-link">For Phone</a></li>
                    <li><a href="#" class="category-link">For Storage</a></li>
                </ul>
            </div>
            <div class="sidebar-section">
                <h3 class="sidebar-title">Other</h3>
                <ul class="category-list">
                    <li><a href="#" class="category-link">New Arrival</a></li>
                    <li><a href="#" class="category-link">Best Seller</a></li>
                    <li><a href="#" class="category-link">On Discount</a></li>
                </ul>
            </div>
        </aside>

        <!-- Products Section -->
        <main class="products-section">
            <!-- Category Tabs -->
            <div class="category-tabs">
                <button class="tab-btn active">Home</button>
                <button class="tab-btn">Other</button>
                <button class="tab-btn">Music</button>
                <button class="tab-btn">Other</button>
            </div>

            <!-- Products Grid -->
            <div class="products-grid">
                @foreach($products->take(6) as $product)
                <div class="product-card">
                        <div class="product-image">
                            <div class="product-category">{{ $product->category ?? 'Uncategorized' }}</div>
                            <a href="{{ route('each.product', $product->id) }}">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->image }}" class="imgs">
                                </a>
                        </div>
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                        <span class="reviews">(4.0 | 45 Reviews)</span>
                    </div>
                    <div class="product-price">${{ number_format($product->price, 2) }}</div>
<div class="product-description">
    <p class="description-text line-clamp">
        {{ $product->description }}
    </p>
    <button class="toggle-btn">Mostrar más</button>
</div>
                    <div class="product-actions">
                           <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                            @csrf
                            <button class="btn-secondary">Add to Chart</button>
                        </form>

                        <button class="btn btn-primary">Buy Now</button>

                    </div>
                </div>
 @endforeach
                        <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".toggle-btn").forEach(function(btn) {
        btn.addEventListener("click", function() {
            const desc = this.previousElementSibling;

            if (desc.classList.contains("expanded")) {
                desc.classList.remove("expanded");
                desc.classList.add("line-clamp");
                this.textContent = "Mostrar más";
            } else {
                desc.classList.remove("line-clamp");
                desc.classList.add("expanded");
                this.textContent = "Mostrar menos";
            }
        });
    });
});
</script>
   </div>

            <div class="pagination">
                <button class="pagination-btn">← Previous</button>
                <div class="pagination-numbers">
                    <button class="pagination-number active">1</button>
                    <button class="pagination-number">2</button>
                    <button class="pagination-number">3</button>
                    <span class="pagination-dots">...</span>
                    <button class="pagination-number">9</button>
                    <button class="pagination-number">10</button>
                </div>
                <button class="pagination-btn">Next →</button>
            </div>

            <!-- Recommendations Section -->
            <section class="recommendations">
                <div class="recommendations-header">
                    <h2>Explore our recommendations</h2>
                    <div class="recommendations-nav">
                        <button class="nav-arrow">←</button>
                        <button class="nav-arrow">→</button>
                    </div>
                </div>

                <div class="recommendations-grid">
                    @foreach($products->take(4) as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <div class="product-category">{{ $product->category ?? 'Uncategorized' }}</div>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->image }}" class="imgs">
                        </div>
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <div class="product-rating">
                            <span class="stars">★★★★★</span>
                            <span class="reviews">(4.0 | 45 Reviews)</span>
                        </div>
                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                        <p class="product-description">{{ $product->description ?? 'No description available.' }}</p>
                        <div class="product-actions">
                            <button class="btn-secondary">Add to Chart</button>
                            <button class="btn-primary">Buy Now</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
@endsection

