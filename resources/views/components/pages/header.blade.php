
<!-- Toast konteyner -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
    {{-- Success Toast --}}
    @if(session('success'))
        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast" aria-label="Yopish"></button>
            </div>
        </div>
    @endif

    {{-- Error Toast --}}
    @if ($errors->any())
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>Xatoliklar:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast" aria-label="Yopish"></button>
            </div>
        </div>
    @endif
</div>



<!-- Start Header Area -->
<header class="header-area">
    <!-- Start Top Header -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <ul class="header-left-content">
                        <li>
                            <a href="{{ route('about') }}">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blogs') }}">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}">
                                Product
                            </a>
                        </li>
                        <li>
                            Need help? Call:
                            <a href="tel:+1-(514)-321-4567">
                                <span>+1 (514) 321-4567</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <div class="header-right-content">
                        <ul>
                            <li>
                                <div class="navbar-option-item navbar-option-language dropdown language-option">
                                    <button class="dropdown-toggle" type="button" id="language2"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="lang-name">English</span>
                                    </button>

                                    <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language2">
                                        <a class="dropdown-item" href="{{ url('locale/en') }}">
                                            <img src="/assets/images/language/english.png" alt="Image">
                                            English
                                        </a>
                                        <a class="dropdown-item" href="{{ url('locale/uz') }}">
                                            <img src="/assets/images/language/deutsch.png" alt="Image">
                                            Uzbek
                                        </a>
                                        <a class="dropdown-item" href="{{ url('locale/ru') }}">
                                            <img src="/assets/images/language/arbic.png" alt="Image">
                                            Русский
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Top Header -->

    <!-- Start Middle Header -->
    <div class="middle-header middle-header-style-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/">
                            <img src="/assets/images/logo.png" alt="Image">
                        </a>
                    </div>
                </div>

                <div class="col-lg-9">
                    <form class="search-box">
                        <input type="text" name="Search" placeholder="Search Products..." class="form-control">
                        <button type="submit" class="search-btn">
                            <i class="ri-search-line"></i>
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Middle Header -->

    <!-- Start Navbar Area -->
    <div class="navbar-area navbar-area-style-two">
        <div class="mobile-responsive-nav">
            <div class="container">
                <div class="mobile-responsive-menu">
                    <div class="navbar-category">
                        <button type="button" id="categoryButton-1" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class="ri-menu-line"></i>
                        </button>
                        <?php
                        $categories = \App\Models\Category::all();
                        $lang = app()->getLocale() ?? 'ru';
                        ?>

                        <div class="navbar-category-dropdown dropdown-menu" aria-labelledby="categoryButton">
                            <ul>
                                @if(empty($categories))
                                    @foreach($categories as $item)
                                        <li>
                                            <a href="{{ route('products') }}">{{ $item['name_' . $lang] }}</a>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a href="{{ route('products') }}">Power Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Hand Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Cordless Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Welding & Soldering</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Gardening Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Air and Gas Powered Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Safety Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Site lighting Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Tools Accessories</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Outdoor Power Equipment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Safety Tools</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="logo">
                        <a href="/">
                            <img src="/assets/images/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="navbar-category">
                        <button type="button" id="categoryButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class="ri-menu-line"></i>
                            ALL CATEGORIES
                            <i class="arrow-down ri-arrow-down-s-line"></i>
                        </button>

                        <div class="navbar-category-dropdown dropdown-menu" aria-labelledby="categoryButton">
                            <ul>
                                @if(empty($categories))
                                    @foreach($categories as $item)
                                        <li>
                                            <a href="{{ route('products') }}">{{ $item['name_' . $lang] }}</a>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a href="{{ route('products') }}">Power Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Hand Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Cordless Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Welding & Soldering</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Gardening Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Air and Gas Powered Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Safety Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Site lighting Tools</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Tools Accessories</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Outdoor Power Equipment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}">Safety Tools</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products') }}" class="nav-link">Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('blogs') }}" class="nav-link">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                            </li>
                        </ul>

                        <div class="others-options">
                            <span>Free shipping on all orders over $100</span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
<!-- End Header Area -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
