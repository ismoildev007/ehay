@extends('layouts.page')

@section('content')

    @foreach($products as $product)
        <!-- Start Product View One Area -->
        <div class="modal fade product-view-one" id="exampleModal{{$product->id}}">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal">
					<span aria-hidden="true">
						<i class="ri-close-line"></i>
					</span>
                    </button>

                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="product-view-one-image">
                                <div id="big" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="{{ asset('storage/' . $product->image) ?? '/assets/images/products/product-1.jpg' }}" alt="Image">
                                    </div>

                                    @php
                                        $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                                    @endphp

                                    @if ($images)
                                        @foreach ($images as $image)
                                            <div class="item">
                                                <img src="{{ asset('storage/' . $image) ?? '/assets/images/products/product-2.jpg' }}" alt="Image">
                                            </div>
                                        @endforeach
                                    @endif

                                </div>

                                <div id="thumbs" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="{{ asset('storage/' . $product->image) ?? '/assets/images/products/product-1.jpg' }}" alt="Image">
                                    </div>

                                    @php
                                        $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                                    @endphp

                                    @if ($images)
                                        @foreach ($images as $image)
                                            <div class="item">
                                                <img src="{{ asset('storage/' . $image) ?? '/assets/images/products/product-2.jpg' }}" alt="Image">
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="product-content">
                                <h3>
                                    {{ $product['name_' . $lang] ?? 'Cordless Drill Professional Combo Drill And Screwdriver'}}
                                </h3>
                                <div class="price">
                                    <span class="new-price">
                                         @if ($product->discount_percent)
                                            ${{ number_format($product->final_price, 2) }}
                                            <del>${{ number_format($product->price, 2) }}</del>
                                        @else
                                            ${{ number_format($product->price, 2) }}
                                        @endif
                                    </span>
                                </div>

                                <ul class="product-info">
                                    <li>
                                        <p>{{ $product['description_' . $lang] ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At magnam ad
                                            reprehenderit fuga nam, non odit necessitatibus facilis beatae temporibus'}}</p>
                                    </li>
                                    <li>
                                        <span>Categories:</span>
                                        <a href="{{ route('category.product', $product->category['slug_' . $lang]) }}">{{ $product->category['name_' . $lang] }}</a>
                                    </li>
                                </ul>

                                <div class="product-add-to-cart">
                                    <a href="javascript: void(0)" class="default-btn">
                                        <i class="ri-shopping-cart-line"></i>
                                        Sotib olish
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product View One Area -->
    @endforeach

    <!-- CONTENT START -->
    <!-- Start Hero Slider Area -->
    <section class="hero-slider-area hero-slider-area-style-two">
        <div class="hero-slider-two owl-carousel owl-theme">
            <div class="slider-item bg-4">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="hero-slider-content">
                                <span>Special Offer</span>
                                <h1>Get The Best Collection Of Hand Tools Right</h1>
                                <p>Free shipping & discount 40% on products</p>

                                <div class="hero-slider-btn">
                                    <a href="{{ route('products') }}" class="default-btn">
                                        <i class="ri-shopping-cart-line"></i>
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item bg-5">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="hero-slider-content">
                                <span>Special Offer</span>
                                <h1>Best Collection For Home Decoration 2024</h1>
                                <p>Free shipping & discount 40% on products</p>

                                <div class="banner-btn">
                                    <a href="{{ route('products') }}" class="default-btn">
                                        <i class="ri-shopping-cart-line"></i>
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item bg-6">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="hero-slider-content">
                                <span>Special Offer</span>
                                <h1>All Types Of Premium Quality Tools</h1>
                                <p>Free shipping & discount 40% on products</p>

                                <div class="banner-btn">
                                    <a href="{{ route('products') }}" class="default-btn">
                                        <i class="ri-shopping-cart-line"></i>
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Slider Area -->

    <!-- Start Popular Categories Area -->
    <section class="popular-categories-area pt-54 pb-30">
        <div class="container">
            <div class="section-title">
                <h2>Popular Categories</h2>
            </div>

            <div class="row justify-content-center">
                @if(!empty($categories))
                    @foreach($categories as $item)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-categories">
                                <a href="{{ route('products') }}">
                                    <img src="/{{ asset('/storage' . $item->image) ?? '/assets/images/products/product-25.png' }}" alt="Image">
                                </a>

                                <h3>
                                    <a href="{{ route('products') }}">
                                        {{ $item['name_' . $lang] }}
                                    </a>
                                </h3>

                                <a href="{{ route('products') }}" class="read-more">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-categories bg-eff5ff">
                            <a href="{{ route('products') }}">
                                <img src="assets/images/products/product-26.png" alt="Image">
                            </a>

                            <h3>
                                <a href="{{ route('products') }}">
                                    Machine Tools
                                </a>
                            </h3>
                            <span>05 Products</span>

                            <a href="{{ route('products') }}" class="read-more">
                                Shop Now
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Popular Categories Area -->

    <!-- Start Featured Products Area -->
    <section class="featured-products-area pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="featured-product-img bg-2">
                        <div class="featured-product-content">
                            <span class="best">Best Deals</span>
                            <h3>Premium Tools Sets</h3>
                            <span class="offer">Up to 30% off</span>
                            <a href="{{ route('products') }}">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="section-title">
                        <h2>Featured Products</h2>
                    </div>

                    <div class="featured-product-wrap">
                        <div class="featured-product-slider owl-carousel owl-theme">

                            @if(!empty($product_feature))
                                @foreach($product_feature as $product)
                                    <div class="single-products">
                                        <div class="product-img">
                                            <a href="{{ route('single.product', $product['slug_' . $lang]) }}">
                                                <img src="{{ assert('storage/' . $product->image) ??'/assets/images/products/product-6.jpg' }}" alt="Image">
                                            </a>

                                            <span class="hot">{{ $product->discount_percent }} %</span>
                                        </div>

                                        <div class="product-content">
                                            <a href="{{ route('single.product', $product['slug_' . $lang]) }}" class="title">
                                                {{ $product['name_' . $lang] ?? 'Cordless Drill Professional Combo Drill And Screwdriver' }}
                                            </a>


                                            <ul class="products-price">
                                                <li>
                                                    @if ($product->discount_percent)
                                                        ${{ number_format($product->final_price, 2) }}
                                                        <del>${{ number_format($product->price, 2) }}</del>
                                                    @else
                                                        ${{ number_format($product->price, 2) }}
                                                    @endif
                                                </li>
                                            </ul>


                                            <ul class="products-cart-wish-view">
                                                <li>
                                                    <a href="#" class="default-btn">
                                                        <i class="ri-shopping-cart-line"></i>
                                                        Sotib olish
                                                    </a>
                                                </li>
                                                <li>
                                                    <button class="eye-btn" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $product->id }}">
                                                        <i class="ri-eye-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="single-products">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img src="assets/images/products/product-6.jpg" alt="Image">
                                        </a>

                                        <span class="hot">Hot</span>
                                    </div>

                                    <div class="product-content">
                                        <a href="product-details.html" class="title">
                                            Cordless Drill Professional Combo Drill And Screwdriver
                                        </a>


                                        <ul class="products-price">
                                            <li>
                                                $119.00
                                                <del>$219.00</del>
                                            </li>
                                            <li>
                                                <span>In Stock</span>
                                            </li>
                                        </ul>

                                        <ul class="products-cart-wish-view">
                                            <li>
                                                <a href="#" class="default-btn">
                                                    <i class="ri-shopping-cart-line"></i>
                                                    Sotib olish
                                                </a>
                                            </li>
                                            <li>
                                                <button class="eye-btn" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                    <i class="ri-eye-line"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Products Area -->

    <!-- Start Best sellers Area -->
    <section class="best-seller-area pb-30">
        <div class="container">
            <div class="section-title">
                <h2>Best Sellers</h2>
            </div>

            <div class="best-product-slider owl-carousel owl-theme">
                @if(!empty($product_seller))
                    @foreach($product_seller as $seller)
                        <div class="single-products">
                            <div class="product-img">
                                <a href="{{ route('single.product', $seller['slug_' . $lang]) }}">
                                    <img src="{{ asset('storage/' . $seller->image) ?? '/assets/images/products/product-1.jpg' }}" alt="Image">
                                </a>

                                <span class="hot new">-{{ $seller->discount_percent }}%</span>
                            </div>

                            <div class="product-content">
                                <a href="{{ route('single.product', $seller['slug_' . $lang]) }}" class="title">
                                    {{ $seller['name_' . $lang] ?? 'Cordless Drill Professional Combo Drill And Screwdriver' }}
                                </a>
                                <ul class="products-price">
                                    <li>
                                        @if ($seller->discount_percent)
                                            ${{ number_format($seller->final_price, 2) }}
                                            <del>${{ number_format($seller->price, 2) }}</del>
                                        @else
                                            ${{ number_format($seller->price, 2) }}
                                        @endif
                                    </li>
                                </ul>

                                <ul class="products-cart-wish-view">
                                    <li>
                                        <a href="#" class="default-btn">
                                            <i class="ri-shopping-cart-line"></i>
                                            Sotib olish
                                        </a>
                                    </li>
                                    <li>
                                        <button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $seller->id }}">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else

                    <div class="single-products">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="assets/images/products/product-2.jpg" alt="Image">
                            </a>

                            <span class="hot new">-20%</span>
                        </div>

                        <div class="product-content">
                            <a href="product-details.html" class="title">
                                Professional Cordless Drill Power Tools Set Competitive Price
                            </a>

                            <ul class="products-rating">
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                                <li>
                                    <i class="ri-star-fill"></i>
                                </li>
                                <li>
                                    <a href="product-details.html">
                                        (03 Review)
                                    </a>
                                </li>
                            </ul>

                            <ul class="products-price">
                                <li>
                                    $130.00
                                    <del>$250.00</del>
                                </li>
                                <li>
                                    <span>In Stock</span>
                                </li>
                            </ul>

                            <ul class="products-cart-wish-view">
                                <li>
                                    <a href="#" class="default-btn">
                                        <i class="ri-shopping-cart-line"></i>
                                        Sotib olish
                                    </a>
                                </li>
                                <li>
                                    <a href="wishlist.html" class="wish-btn">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </section>
    <!-- End Best sellers Area -->

    <!-- Start Sale Offer Area -->
    <section class="sale-offer-area">
        <div class="container">
            <div class="sale-offer-bg bg-2">
                <h5>Sale offer - <span>30% off</span></h5>
                <h3>All types of premium quality tools</h3>
                <a href="{{ route('products') }}" class="default-btn">
                    <i class="ri-shopping-cart-line"></i>
                    Shop Now
                </a>
            </div>
        </div>
    </section>
    <!-- End Sale Offer Area -->

    <!-- Start New Arrivals Area -->
    <section class="new-arrivals-area pb-30 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="section-title">
                        <h2>Trending Products</h2>
                    </div>

                    <ul class="trending-product-list">
                        @if(!empty($product_popular))
                            @foreach($product_popular as $data)
                                <li class="single-list">
                                    <img src="{{ asset('storage/' . $data->image) ?? 'assets/images/products/product-12.jpg'}}" alt="Image">

                                    <div class="product-content">
                                        <a href="{{ route('single.product', $data['slug_' . $lang]) }}" class="title">
                                            {{'Good Quality Electric Cordless Drill'}}
                                        </a>

                                        <ul class="products-price">
                                            <li>
                                                @if ($data->discount_percent)
                                                    ${{ number_format($data->final_price, 2) }}
                                                    <del>${{ number_format($data->price, 2) }}</del>
                                                @else
                                                    ${{ number_format($data->price, 2) }}
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        @else

                            <li class="single-list">
                                <img src="assets/images/products/product-13.jpg" alt="Image">

                                <div class="product-content">
                                    <a href="product-details.html" class="title">
                                        High Quality Industrial Wood Planer
                                    </a>

                                    <ul class="products-price">
                                        <li>
                                            $19.00
                                            <del>$30.00</del>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="section-title">
                        <h2>New Arrivals</h2>

                        <a href="{{ route('products') }}" class="read-more">
                            View All
                        </a>
                    </div>

                    <div class="row">
                        @if(!empty($products))
                            @foreach($products as $pro)
                                <div class="col-xl-3 col-sm-6">
                                    <div class="single-products new-arrivals">
                                        <div class="product-img">
                                            <a href="{{ route('single.product', $pro['slug_' . $lang]) }}">
                                                <img src="{{asset('storage/' . $pro->image) ?? 'assets/images/products/product-17.jpg'}}" alt="Image">
                                            </a>

                                            <span class="hot">{{ $pro->discount_percent ?? 'new' }}</span>
                                        </div>

                                        <div class="product-content">
                                            <a href="{{ route('single.product', $pro['slug_' . $lang]) }}" class="title">
                                                {{ $pro['name_' . $lang] ?? 'Electrical Magnetic Impact Power Hammer Drills' }}
                                            </a>

                                            <ul class="products-price">
                                                <li>
                                                    @if ($pro->discount_percent)
                                                        ${{ number_format($pro->final_price, 2) }}
                                                        <del>${{ number_format($pro->price, 2) }}</del>
                                                    @else
                                                        ${{ number_format($pro->price, 2) }}
                                                    @endif
                                                </li>
                                            </ul>

                                            <ul class="products-cart-wish-view">
                                                <li>
                                                    <a href="#" class="default-btn">
                                                        <i class="ri-shopping-cart-line"></i>
                                                        Sotib olish
                                                    </a>
                                                </li>
                                                <li>
                                                    <button class="eye-btn" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $pro->id }}">
                                                        <i class="ri-eye-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-xl-3 col-sm-6">
                                <div class="single-products new-arrivals">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img src="assets/images/products/product-18.jpg" alt="Image">
                                        </a>
                                    </div>

                                    <div class="product-content">
                                        <a href="product-details.html" class="title">
                                            High Quality Electric Hand Planer, 4-3/8-Inch
                                        </a>

                                        <ul class="products-rating">
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <i class="ri-star-fill"></i>
                                            </li>
                                            <li>
                                                <a href="product-details.html">
                                                    (05 Review)
                                                </a>
                                            </li>
                                        </ul>

                                        <ul class="products-price">
                                            <li>
                                                $69.00
                                                <del>$90.00</del>
                                            </li>
                                            <li>
                                                <span>In Stock</span>
                                            </li>
                                        </ul>

                                        <ul class="products-cart-wish-view">
                                            <li>
                                                <a href="#" class="default-btn">
                                                    <i class="ri-shopping-cart-line"></i>
                                                    Sotib olish
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html" class="wish-btn">
                                                    <i class="ri-heart-line"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button class="eye-btn" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                    <i class="ri-eye-line"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End New Arrivals Area -->

    <!-- Start Sale Discount Area -->
    <section class="sale-discount-area pb-54">
        <div class="container">
            <div class="sale-discount-bg">
                <div class="discount-content">
                    <h5>Get Discount 30% Off</h5>
                    <h3>New Lower Prices On Hundreds Premium Quality Tools</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sale Discount Area -->


    <!-- Start Our Blog Area -->
    <section class="our-blog-area pb-30">
        <div class="container">
            <div class="section-title">
                <h2>Our Blog Posts</h2>
                <a href="{{ route('blogs') }}" class="read-more">
                    View All
                </a>
            </div>

            <div class="row justify-content-center">
                @if(!empty($blogs))
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog">
                                <a href="{{ route('single.blog', $blog['slug_' . $lang]) }}">
                                    <img src="{{ asset('storage/' . $blog->image) ?? 'assets/images/blog/blog-1.jpg' }}" alt="Image">
                                </a>

                                <div class="blog-content">
                                    <ul>
                                        <li>
                                            Admin
                                        </li>
                                        <li>
                                            {{ $blog->date ?? 'July 30, 2024' }}
                                        </li>
                                    </ul>

                                    <h3>
                                        <a href="{{ route('single.blog', $blog['slug_' . $lang]) }}">
                                            {{ $blog['title_' . $lang] ?? 'Powerful Motor For The Best Performance In Compound Miter Saw' }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/blog-2.jpg" alt="Image">
                            </a>

                            <div class="blog-content">
                                <ul>
                                    <li>
                                        <a href="author.html">
                                            Admin
                                        </a>
                                    </li>
                                    <li>
                                        July 05, 2024
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            (03) Comments
                                        </a>
                                    </li>
                                </ul>

                                <h3>
                                    <a href="blog-details.html">
                                        Why We Used One Of The Best Corded Drill Power Tools
                                    </a>
                                </h3>

                                <a href="blog-details.html" class="default-btn">
                                    Sotib olish
                                    <i class="ri-arrow-right-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Our Blog Area -->

    <!-- Start Partner Area -->
    <div class="partner-area pb-54">
        <div class="container">
            <div class="partner-wrap">
                <div class="partner-slider owl-carousel owl-theme">
                    <div class="partner-item">
                        <img src="assets/images/partners/partner-1.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/images/partners/partner-2.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/images/partners/partner-3.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/images/partners/partner-4.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/images/partners/partner-5.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/images/partners/partner-6.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner Area -->

    <!-- Start Special Area -->
    <section class="special-area pb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="section-title">
                        <h2>Special Offers</h2>
                    </div>

                    <ul class="trending-product-list special-product-list">
                        @if(!empty($product_special))
                            @foreach($product_special as $special)
                                <li class="single-list">
                                    <img src="{{ asset('storage/' . $special->image) ?? "/assets/images/products/product-31.jpg" }}" alt="Image">

                                    <div class="product-content">
                                        <a href="{{ route('single.product', $special['slug_' . $lang]) }}" class="title">
                                            {{$special['name_' . $lang] ?? 'White Whale Vacuum Cleaner High Quality Product'}}
                                        </a>

                                        <ul class="products-price">
                                            <li>
                                                @if ($special->discount_percent)
                                                    ${{ number_format($special->final_price, 2) }}
                                                    <del>${{ number_format($special->price, 2) }}</del>
                                                @else
                                                    ${{ number_format($special->price, 2) }}
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        @else

                            <li class="single-list">
                                <img src="assets/images/products/product-33.jpg" alt="Image">

                                <div class="product-content">
                                    <a href="product-details.html" class="title">
                                        Power Tools Set Chinese Manufacturer Production 50V Lithu Battery
                                    </a>

                                    <ul class="products-price">
                                        <li>
                                            $29.00
                                            <del>$50.00</del>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="section-title">
                        <h2>Popular Products</h2>
                    </div>

                    <ul class="trending-product-list special-product-list">
                        @if(!empty($product_popular))
                            @foreach($product_popular as $popular)
                                <li class="single-list">
                                    <img src="{{ asset('storage/' . $popular->image) ?? "/assets/images/products/product-31.jpg" }}" alt="Image">

                                    <div class="product-content">
                                        <a href="{{ route('single.product', $popular['slug_' . $lang]) }}" class="title">
                                            {{$popular['name_' . $lang] ?? 'White Whale Vacuum Cleaner High Quality Product'}}
                                        </a>

                                        <ul class="products-price">
                                            <li>
                                                @if ($popular->discount_percent)
                                                    ${{ number_format($popular->final_price, 2) }}
                                                    <del>${{ number_format($popular->price, 2) }}</del>
                                                @else
                                                    ${{ number_format($popular->price, 2) }}
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        @else

                            <li class="single-list">
                                <img src="/assets/images/products/product-33.jpg" alt="Image">

                                <div class="product-content">
                                    <a href="product-details.html" class="title">
                                        Power Tools Set Chinese Manufacturer Production 50V Lithu Battery
                                    </a>

                                    <ul class="products-price">
                                        <li>
                                            $29.00
                                            <del>$50.00</del>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="section-title">
                        <h2>Top Rated Products</h2>
                    </div>

                    <ul class="trending-product-list special-product-list">
                        @if(!empty($product_top))
                            @foreach($product_top as $top)
                                <li class="single-list">
                                    <img src="{{ asset('storage/' . $top->image) ?? "/assets/images/products/product-31.jpg" }}" alt="Image">

                                    <div class="product-content">
                                        <a href="{{ route('single.product', $top['slug_' . $lang]) }}" class="title">
                                            {{$top['name_' . $lang] ?? 'White Whale Vacuum Cleaner High Quality Product'}}
                                        </a>

                                        <ul class="products-price">
                                            <li>
                                                @if ($top->discount_percent)
                                                    ${{ number_format($top->final_price, 2) }}
                                                    <del>${{ number_format($top->price, 2) }}</del>
                                                @else
                                                    ${{ number_format($top->price, 2) }}
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        @else

                            <li class="single-list">
                                <img src="/assets/images/products/product-33.jpg" alt="Image">

                                <div class="product-content">
                                    <a href="product-details.html" class="title">
                                        Power Tools Set Chinese Manufacturer Production 50V Lithu Battery
                                    </a>

                                    <ul class="products-price">
                                        <li>
                                            $29.00
                                            <del>$50.00</del>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Special Area -->

    <!-- Start Services Area -->
    <section class="services-area pt-0 pb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-services">
                        <div class="icon">
                            <img src="assets/images/icon/support.png" alt="Image">
                        </div>
                        <h3>Customer Support</h3>
                        <p>24/7 We are customer care best support</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single-services">
                        <div class="icon">
                            <img src="assets/images/icon/payment.png" alt="Image">
                        </div>
                        <h3>Secure Payments</h3>
                        <p>Pay with the world's top payment methods</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single-services">
                        <div class="icon">
                            <img src="assets/images/icon/network.png" alt="Image">
                        </div>
                        <h3>Worldwide Delivery</h3>
                        <p>What you want, delivered to where you want</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Subscribe Area -->
    <section class="subscribe-area ptb-54">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="/">
                            <img src="assets/images/white-logo.png" alt="Image">
                        </a>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="subscribe-content">
                        <span>30% Discount For Your First Order</span>
                        <h3>Subscribe To Our Newsletter</h3>
                        <p>Subscribe to the newsletter for all the latest updates</p>
                    </div>
                </div>

                <div class="col-lg-5">
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="form-control" placeholder="Your email address" name="EMAIL"
                               required="" autocomplete="off">

                        <button class="submit-btn" type="submit">
                            Subscribe
                        </button>

                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe  Area -->
    <!-- CONTENT END -->

@endsection
