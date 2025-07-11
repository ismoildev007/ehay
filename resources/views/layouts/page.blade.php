<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <!-- Remixicon CSS -->
    <link rel="stylesheet" href="/assets/css/remixicon.css">
    <!-- Meanmenu Min CSS -->
    <link rel="stylesheet" href="/assets/css/meanmenu.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Title -->
    <title>Ehay - Tools Store eCommerce HTML Template</title>
</head>

<body>
<!-- Start Preloader Area -->
<div class="preloader">
    <div class="content">
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader Area -->

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


@include('components.pages.header')

@yield('content')

@include('components.pages.footer')

<!-- Jquery Min JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<!-- Bootstrap Bundle Min JS -->
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<!-- Meanmenu Min JS -->
<script src="/assets/js/meanmenu.min.js"></script>
<!-- Owl Carousel Min JS -->
<script src="/assets/js/owl.carousel.min.js"></script>
<!-- Range Slider Min JS -->
<script src="/assets/js/range-slider.min.js"></script>
<!-- Form Validator Min JS -->
<script src="/assets/js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="/assets/js/contact-form-script.js"></script>
<!-- Ajaxchimp Min JS -->
<script src="/assets/js/ajaxchimp.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/custom.js"></script>
<script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'95ac9808bee5dd2c',t:'MTc1MTc3ODYwNy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
</body>

</html>
