<!DOCTYPE html>
<html lang="en">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="description" content="">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="/pages/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="/pages/images/favicon.png">

    <!-- PAGE TITLE HERE -->
    <title>Corporative Building</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/pages/css/bootstrap.min.css">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/pages/css/fontawesome/css/font-awesome.min.css">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/pages/css/owl.carousel.min.css">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/pages/css/magnific-popup.min.css">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/pages/css/loader.min.css">
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/pages/css/flaticon.min.css">
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/pages/css/style.css">
    <!-- Color Theme Change Css -->
    <link rel="stylesheet" class="skin" type="text/css" href="css/skin/skin-1.css">
    <!-- Side Switcher Css-->
    <link rel="stylesheet" type="text/css" href="/pages/css/switcher.css">

    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="/pages/plugins/revolution/revolution/css/settings.css">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="/pages/plugins/revolution/revolution/css/navigation.css">

    <!-- Google Fonts -->
    <link href="/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="/css-1?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body>

<div class="page-wraper">

    @include('components.pages.header')

    @yield('content')

    @include('components.pages.footer')

    <!-- BUTTON TOP START -->
    <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>

</div>

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-loader">Loading</div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->
<!-- STYLE SWITCHER  ======= -->
<div class="styleswitcher">

    <div class="switcher-btn-bx">
        <a class="switch-btn">
            <span class="fa fa-cog fa-spin"></span>
        </a>
    </div>

    <div class="styleswitcher-inner">

{{--        <h6 class="switcher-title">Color Skin</h6>--}}
        <ul class="color-skins">
{{--            <li><a class="theme-skin skin-1" href="index-1.html?theme=css/skin/skin-1" title="default Theme"></a></li>--}}
{{--            <li><a class="theme-skin skin-2" href="index-5.html?theme=css/skin/skin-2" title="pink Theme"></a></li>--}}
{{--            <li><a class="theme-skin skin-3" href="index-6.html?theme=css/skin/skin-3" title="sky Theme"></a></li>--}}
{{--            <li><a class="theme-skin skin-4" href="index-7.html?theme=css/skin/skin-4" title="green Theme"></a></li>--}}
{{--            <li><a class="theme-skin skin-5" href="index-8.html?theme=css/skin/skin-5" title="red Theme"></a></li>--}}
{{--            <li><a class="theme-skin skin-6" href="index-9.html?theme=css/skin/skin-6" title="orange Theme"></a></li>--}}
{{--            <li><a class="theme-skin skin-7" href="index-10.html?theme=css/skin/skin-7" title="purple Theme"></a></li>--}}
{{--            <li><a class="theme-skin skin-8" href="index-11.html?theme=css/skin/skin-8" title="blue Theme"></a></li>--}}
        </ul>

    </div>
</div>
<!-- STYLE SWITCHER END ==== -->

<!-- JAVASCRIPT  FILES ========================================= -->
<script src="/pages/js/jquery-3.6.1.min.js"></script><!-- JQUERY.MIN JS -->
<script src="/pages/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/pages/js/popper.min.js"></script><!-- POPPER.MIN JS -->
<script src="/pages/js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->
<script src="/pages/js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script src="/pages/js/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="/pages/js/waypoints-sticky.min.js"></script><!-- COUNTERUP JS -->
<script src="/pages/js/isotope.pkgd.min.js"></script><!-- MASONRY  -->
<script src="/pages/js/imagesloaded.pkgd.min.js"></script><!-- MASONRY  -->
<script src="/pages/js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->
<script src="/pages/js/jquery.owl-filter.js"></script>
<script src="/pages/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="/pages/js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->
<script src="/pages/js/jquery.bgscroll.js"></script><!-- BACKGROUND SCROLL -->
<script src="/pages/js/switcher.js"></script>
<!-- SWITCHER FUCTIONS  -->
<!-- REVOLUTION JS FILES -->

<script src="/pages/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/pages/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="/pages/plugins/revolution/revolution/js/extensions/revolution-plugin.js"></script>

<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script src="/pages/js/rev-script-1.js"></script>




</body>

</html>
