@extends('layouts.page')

@section('content')


    <!-- Start Cart Shit Area -->
    <div class="modal fade cart-shit" id="exampleModal-cart" tabindex="-1" aria-hidden="true">
        <div class="cart-shit-wrap">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close-btn" data-bs-dismiss="modal">
                            <i class="ri-close-fill"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <ul class="cart-list">
                            <li>
                                <img src="assets/images/products/product-1.jpg" alt="Image">
                                <a href="shopping-cart.html">
                                    DFMALB 20V Max XX Oscillating Multi Tool Variable Speed Tool
                                </a>
                                <span>$125.00</span>
                                <i class="ri-close-fill"></i>
                            </li>

                            <li>
                                <img src="assets/images/products/product-2.jpg" alt="Image">
                                <a href="shopping-cart.html">
                                    Power Tools Set Chinese Manufacturer Production 50V Lithu Battery
                                </a>
                                <span>$125.00</span>
                                <i class="ri-close-fill"></i>
                            </li>

                            <li>
                                <img src="assets/images/products/product-3.jpg" alt="Image">
                                <a href="shopping-cart.html">
                                    Electrical Magnetic Impact Power Hammer Drills Machine
                                </a>
                                <span>$125.00</span>
                                <i class="ri-close-fill"></i>
                            </li>

                            <li>
                                <img src="assets/images/products/product-4.jpg" alt="Image">
                                <a href="shopping-cart.html">
                                    Professional Cordless Drill Power Tools Set Competitive Price
                                </a>
                                <span>$125.00</span>
                                <i class="ri-close-fill"></i>
                            </li>
                        </ul>

                        <ul class="payable">
                            <li>
                                Payable total
                            </li>
                            <li class="total">
                                <span>$564.00</span>
                            </li>
                        </ul>

                        <ul class="cart-check-btn">
                            <li>
                                <a href="shopping-cart.html" class="default-btn">
                                    View Cart
                                </a>
                            </li>
                            <li class="checkout">
                                <a href="checkout.html" class="default-btn">
                                    Checkout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Shit Area -->

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <ul>
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>

                    <li class="active">About</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <div class="about-area ptb-54">
        <div class="container">
            <div class="about-content">
                <h3>Who We Are</h3>
                <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque in ipsum id orci porta dapibus. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>

                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>

            <div class="gap-30"></div>

            <div class="about-img">
                <img src="assets/images/about-img.jpg" alt="Image">
            </div>

            <div class="gap-30"></div>

            <div class="about-content">
                <h3>What We Do</h3>
                <p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque in ipsum id orci porta dapibus. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>

                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. </p>
            </div>

            <div class="gap-30"></div>

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

            <div class="gap-30"></div>

            <div class="about-content">
                <h3>Our Workplace</h3>
                <p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Pellentesque in ipsum id orci porta dapibus. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>

                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed </p>
            </div>

            <div class="gap-30"></div>

            <div class="about-content">
                <h3>Our Employees</h3>

                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed </p>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    <!-- Start Team Area -->
    <div class="team-area pb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-team">
                        <img src="assets/images/team/team-1.jpg" alt="Image">
                        <h3>Kevin C. James</h3>
                        <span>SEO</span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-team">
                        <img src="assets/images/team/team-2.jpg" alt="Image">
                        <h3>Britney French</h3>
                        <span>Sales Marketing</span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-team">
                        <img src="assets/images/team/team-3.jpg" alt="Image">
                        <h3>Robert N. Melancon</h3>
                        <span>Sales Marketing</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Area -->

    <!-- Start Subscribe Area -->
    <section class="subscribe-area pt-54 pb-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="index.html">
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
