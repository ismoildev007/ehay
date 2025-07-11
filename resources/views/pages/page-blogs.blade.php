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

                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Blog Area -->
    <section class="blog-post-area ptb-54">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        @foreach($blogs as $blog)
                            <div class="col-lg-12 col-md-6">
                                <div class="single-blog blog-post">
                                    <a href="{{ route('single.blog', $blog['slug_' . $lang]) }}">
                                        <img src="{{ asset('storage/' . $blog->image) ?? '/assets/images/blog/blog-1.jpg' }}" alt="Image">
                                    </a>

                                    <div class="blog-content">
                                        <ul>
                                            <li>
                                                <a href="javascript: void(0)">
                                                    Admin
                                                </a>
                                            </li>
                                            <li>
                                                {{ $blog->date }}
                                            </li>
                                        </ul>

                                        <h3>
                                            <a href="{{ route('single.blog', $blog['slug_' . $lang]) }}">
                                                {{ $blog['title_' . $lang] ?? 'Powerful Motor For The Best Performance In Compound Miter Saw' }}
                                            </a>
                                        </h3>

                                        <p>{!! $blog['content_' . $lang] !!}</p>

                                        <a href="{{ route('single.blog', $blog['slug_' . $lang]) }}" class="default-btn">
                                            Read More
                                            <i class="ri-arrow-right-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                        <div class="col-lg-12 col-md-6">--}}
{{--                            <div class="single-blog blog-post">--}}
{{--                                <a href="blog-details.html">--}}
{{--                                    <img src="assets/images/blog/blog-3.jpg" alt="Image">--}}
{{--                                </a>--}}

{{--                                <div class="blog-content">--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <a href="author.html">--}}
{{--                                                Admin--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            July 15, 2024--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="blog-details.html">--}}
{{--                                                (03) Comments--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

{{--                                    <h3>--}}
{{--                                        <a href="blog-details.html">--}}
{{--                                            The Most Advanced Quality Tools For Welding Work--}}
{{--                                        </a>--}}
{{--                                    </h3>--}}

{{--                                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui.</p>--}}

{{--                                    <a href="blog-details.html" class="default-btn">--}}
{{--                                        Read More--}}
{{--                                        <i class="ri-arrow-right-line"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-12">
                            <div class="pagination-area">
                                {{ $blogs->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="widget-sidebar ml-15">
{{--                        <div class="sidebar-widget search">--}}
{{--                            <form class="search-form">--}}
{{--                                <input class="form-control" name="search" placeholder="Search..." type="text">--}}
{{--                                <button class="search-button" type="submit">--}}
{{--                                    <i class="ri-search-line"></i>--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </div>--}}

                        <div class="sidebar-widget categories">
                            <ul>
                                <li>
                                    <h3>Categories</h3>
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

                        <div class="sidebar-widget recent-post">
                            <ul>
                                <li class="pl-0">
                                    <h3>Recent posts</h3>
                                </li>
                                @foreach($resentBlogs as $item)
                                    <li>
                                        <a href="{{ route('single.blog', $item['slug_' . $lang]) }}">
                                            {{ $item['title_' . $lang] }}
                                            <img src="{{ asset('storage/' . $item->image) ?? '/assets/images/blog/recent-1.jpg' }}" alt="Image">
                                        </a>
                                        <span>{{ $item->date }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

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
