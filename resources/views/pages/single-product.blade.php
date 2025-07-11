@extends('layouts.page')

@section('content')

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

                    <li class="active">Product Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Product Details Area -->
    <section class="product-details-area ptb-54">
        <div class="container">
            <div class="row align-items-center">
                <div class="product-view-one">
                    <div class="modal-content p-0">
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
                                <div class="product-content ml-15">
                                    <h3>
                                        {{ $product['name_' . $lang] ?? 'Cordless Drill Professional Combo Drill And Screwdriver' }}
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
                                            <p>
                                                {!! $product['description_' . $lang] !!}
                                            </p>
                                        </li>

                                        <li>
                                            <span>Availability:</span>
                                            {{ $product->type }}
                                        </li>
                                        <li>
                                            <span>Categories:</span>
                                            <a href="{{ route('category.product', $product->category['slug_' . $lang]) }}">{{ $product->category['name_' . $lang] }}</a>
                                        </li>
                                    </ul>

                                    <div class="product-add-to-cart">
{{--                                        <div class="input-counter">--}}
{{--												<span class="minus-btn">--}}
{{--													<i class="ri-add-line"></i>--}}
{{--												</span>--}}

{{--                                            <input type="text" value="1">--}}

{{--                                            <span class="plus-btn">--}}
{{--													<i class="ri-subtract-line"></i>--}}
{{--												</span>--}}
{{--                                        </div>--}}

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

                <div class="col-lg-12 col-md-12">
                    <div id="reviews" class="tab products-details-tab">
                        <div class="row">
{{--                            <div class="col-lg-12 col-md-12">--}}
{{--                                <ul class="tabs">--}}
{{--                                    <li>--}}
{{--                                        Description--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        Additional Information--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        Reviews--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content">
                                    <div class="tabs_item">
                                        <div class="products-details-tab-content">
                                            <h3>Product Description</h3>
                                            {!! $product['content_' . $lang] !!}
                                            <p>Design inspiration lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum.  Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Nulla libero. Vivamus pharetra posuere sapien.</p>

                                            <p>Design inspiration lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum.  Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Nam consectetuer.</p>

{{--                                            <h3>Specification</h3>--}}

{{--                                            <ul class="specification">--}}
{{--                                                <li>Model: 001</li>--}}
{{--                                                <li>Battery Chemistry: Lithm</li>--}}
{{--                                                <li>Battery Voltage: 120V</li>--}}
{{--                                                <li>Battery Capacity: 1.0Ah</li>--}}
{{--                                                <li>Max Capacity In Metal: 20mm</li>--}}
{{--                                                <li>Weight: 2.5kg</li>--}}
{{--                                                <li>Drilling capacity: Concrete: 32 mm</li>--}}
{{--                                                <li>No Load Speed:0-520 rpm</li>--}}
{{--                                            </ul>--}}
                                        </div>
                                    </div>

{{--                                    <div class="tabs_item">--}}
{{--                                        <div class="products-details-tab-content">--}}
{{--                                            <ul class="additional-information">--}}
{{--                                                <li><span>Brand:</span> ThemeForest</li>--}}
{{--                                                <li><span>Color:</span> Brown</li>--}}
{{--                                                <li><span>Size:</span> Large, Medium</li>--}}
{{--                                                <li><span>Weight:</span> 27 kg</li>--}}
{{--                                                <li><span>Dimensions:</span> 16 x 22 x 123 cm</li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Details Area -->

    <!-- Start Related Products Area -->
    <section class="best-seller-area pb-30">
        <div class="container">
            <div class="section-title">
                <h2>Related Products</h2>
            </div>


            <div class="best-product-slider owl-carousel owl-theme">
                @foreach($products as $product)
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
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Related Products Area -->

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
