@extends('layouts.page')

@section('content')
    @foreach($products as $product)
        <!-- Start Product View One Area -->
        <div class="modal fade product-view-one" id="exampleModal-view{{$product->id}}">
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


    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li>
                        <a href="/">
                            Home
                        </a>
                    </li>

                    <li class="active">Products</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Product Area -->
    <section class="products-area ptb-54">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget-sidebar mr-15">
                        <div class="sidebar-widget categories">
                            <ul>
                                <li>
                                    <h3>Product Categories</h3>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('category.product', $category['slug_' . $lang]) }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            {{ $category['name_' . $lang] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar-widget filter">
                            <h3>Filter By Price</h3>
                            <form class="price-range-content">
                                <div class="price-range-bar" id="range-slider"></div>
                                <div class="price-range-filter">
                                    <div class="price-range-filter-item">
                                        <input type="text" id="price-amount" readonly="">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="trendingss">
                            <ul class="trending-product-list">
                                <li>
                                    <h3>Trending Products</h3>
                                </li>
                                @foreach($product_top as $top)
                                    <li class="single-list">
                                        <img src="{{ asset('storage/' . $top->image) ?? '/assets/images/products/product-12.jpg'}}" alt="Image">

                                        <div class="product-content">
                                            <a href="{{ route('single.product', $top['slug_' . $lang]) }}" class="title">
                                                {{ $top['name_' . $lang] ?? 'Good Quality Electric Cordless Drill '}}
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
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="sale-offer-bg product-page">
                        <h5>Sale offer - <span>30% off</span></h5>
                        <h3>All types of premium quality tools</h3>
                        <a href="{{ route('products') }}" class="default-btn">
                            <i class="ri-shopping-cart-line"></i>
                            Shop Now
                        </a>
                    </div>

                    <div class="showing-result">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="products-filter-options">
                                    <div class="view-list-row">
                                        <div class="view-column">
                                            <a href="javascript:;" class="icon-view-three active">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                            <a href="javascript:;" class="view-grid-switch">
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="showing-result-count">
                                    <p>Showing 16 of 60 products</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="products-filter" class="products-collections-listing row justify-content-center">
                        @foreach($products as $product)
                            <div class="col-lg-6 col-md-6">
                                <div class="single-products">
                                    <div class="product-img">
                                        <a href="{{ route('single.product', $product['slug_' . $lang]) }}">
                                            <img src="{{ asset('storage' . $product->image) }}" alt="Image">
                                        </a>
                                    </div>

                                    <div class="product-content">
                                        <a href="{{ route('single.product', $product['slug_' . $lang]) }}" class="title">
                                            {{ $product['name_' . $lang] ??'Cordless Drill Professional Combo Drill And Screwdriver'}}
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
                                                <a href="javascript: void(0)" class="default-btn">
                                                    <i class="ri-shopping-cart-line"></i>
                                                    Add To Cart
                                                </a>
                                            </li>
                                            <li>
                                                <button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-view{{$product->id}}">
                                                    <i class="ri-eye-line"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">
                            <div class="pagination-area">
                                {{ $products->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->

    <!-- Start Subscribe Area -->
    <section class="subscribe-area pt-54 pb-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="/">
                            <img src="/assets/images/white-logo.png" alt="Image">
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
                        <input type="email" class="form-control" placeholder="Your email address" name="EMAIL" required="" autocomplete="off">

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

@endsection
