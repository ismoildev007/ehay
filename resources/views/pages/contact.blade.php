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

                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- End Contact Area -->
    <section class="contact-area ptb-54">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info-europe">
                        <h3>Contact Details</h3>

                        <ul>
                            <li class="p-0">
                                <h4>Europe Office</h4>
                            </li>
                            <li>
                                <i class="ri-map-pin-line"></i>
                                2491 Reel Avenue Albuquerque, NM
                            </li>
                            <li>
                                <i class="ri-phone-line"></i>
                                <a href="tel:+1-(514)-321-4566">+1 (514) 321-4566</a>
                                <a href="tel:+1-(514)-321-4567">+1 (514) 321-4567</a>
                            </li>
                            <li>
                                <i class="ri-mail-send-line"></i>
                                <a href="/cdn-cgi/l/email-protection#33565b524a73564b525e435f561d505c5e"><span class="__cf_email__" data-cfemail="99fcf1f8e0d9fce1f8f4e9f5fcb7faf6f4">[email&#160;protected]</span></a>
                            </li>
                            <li>
                                <i class="ri-time-line"></i>
                                Mon-Sat 8:00 AM - 8:00 PM
                            </li>
                        </ul>

                        <ul>
                            <li class="p-0">
                                <h4>Asia Office</h4>
                            </li>
                            <li>
                                <i class="ri-map-pin-line"></i>
                                2491 Reel Avenue Albuquerque, NM
                            </li>
                            <li>
                                <i class="ri-phone-line"></i>
                                <a href="tel:+1-(514)-321-4566">+1 (514) 321-4566</a>
                                <a href="tel:+1-(514)-321-4567">+1 (514) 321-4567</a>
                            </li>
                            <li>
                                <i class="ri-mail-send-line"></i>
                                <a href="/cdn-cgi/l/email-protection#f4919c958db4918c9599849891da979b99"><span class="__cf_email__" data-cfemail="cda8a5acb48da8b5aca0bda1a8e3aea2a0">[email&#160;protected]</span></a>
                            </li>
                            <li>
                                <i class="ri-time-line"></i>
                                Mon-Sat 8:00 AM - 8:00 PM
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14472.418608564649!2d91.8415882!3d24.92850455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1629205389502!5m2!1sen!2sbd"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

    <!-- Start Contact Area -->
    <section class="contact-area pb-54">
        <div class="container">
            <div class="contact-form">
                <h2>Leave A Message</h2>

                <form id="contactForm">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone_number" id="phone_number" required="" data-error="Please enter your number" class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6" required="" data-error="Write your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check ps-0">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input name="gridCheck" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required="">

                                        <label class="form-check-label" for="gridCheck">
                                            I agree to the <a href="terms-conditions.html">Terms</a> and <a href="privacy-policy.html">Privacy Policy</a>
                                        </label>
                                        <div class="help-block with-errors gridCheck-error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">
                                <span>Send Message</span>
                            </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

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
