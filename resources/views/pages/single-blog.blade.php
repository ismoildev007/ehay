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

                    <li class="active">Blog Details</li>
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
                    <div class="blog-details-content mr-15">
                        <div class="blog-details-img">
                            <img src="{{ asset('storage/' . $blog->image) ?? '/assets/images/blog/blog-1.jpg' }}" alt="Image">
                        </div>

                        <div class="blog-top-content">
                            <div class="blog-content">
                                <ul class="admin">
                                    <li>
                                        <a href="javascript: void(0)">
                                            Admin
                                        </a>
                                    </li>

                                    <li>
                                        {{ $blog->date }}
                                    </li>
                                </ul>

                                <h3>{{ $blog['title_' . $lang] }}</h3>

                                {!! $blog['content_' . $lang] !!}

                                <p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget.</p>

                                <p>Sed porttitor lectus nibh. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque</p>

                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh</p>

                                <p>Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                            </div>

                        </div>

                        <div class="leave-reply mt-5">
                            <h3>Leave A Reply</h3>

                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <p>Your phone will not be published. Required fields are marked*</p>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input type="text" name="full_name" id="name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Phone*</label>
                                            <input type="text" name="phone" id="phone" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <textarea name="message" class="form-control" id="message" rows="8"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Post A Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
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
