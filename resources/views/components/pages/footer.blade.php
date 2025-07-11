<!-- Start Footer  Area -->
<div class="footer-area pt-54 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Quick Information</h3>

                    <ul class="info-list">
                        <li>
                            <i class="ri-map-pin-line"></i>
                            2491 Reel Avenue Albuquerque, NM
                        </li>
                        <li>
                            <i class="ri-phone-line"></i>
                            <a href="tel:+1-(514)-321-4566">+1 (514) 321-4566</a>
                        </li>
                        <li>
                            <i class="ri-mail-send-line"></i>
                            <a href="/cdn-cgi/l/email-protection#85e0ede4fcc5e0fde4e8f5e9e0abe6eae8"><span
                                    class="__cf_email__"
                                    data-cfemail="d6b3beb7af96b3aeb7bba6bab3f8b5b9bb">[email&#160;protected]</span></a>
                        </li>
                        <li>
                            <i class="ri-time-line"></i>
                            Mon-Sat 8:00 AM - 8:00 PM
                        </li>
                    </ul>

                    <ul class="social-link">
                        <li>
                            <span>Stay connected:</span>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/" target="_blank">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/" target="_blank">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="ri-instagram-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Category</h3>
                    <?php
                    $categories = \App\Models\Category::latest()->limit(6)->get();
                    $lang = app()->getLocale();
                    ?>

                    <ul class="import-link">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('category.product', $category['slug_' . $lang]) }}">{{ $category['name_' . $lang] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Customer Service</h3>

                    <ul class="import-link">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About</a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}">Products</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Download App On Mobile</h3>
                    <p>30% discount on your first order</p>

                    <ul class="app-btn">
                        <li>
                            <a href="https://www.apple.com/store" target="_blank">
                                <img src="/assets/images/app-store.png" alt="Image">
                            </a>
                        </li>
                        <li>
                            <a href="https://play.google.com/store/apps" target="_blank">
                                <img src="/assets/images/google-play.png" alt="Image">
                            </a>
                        </li>
                    </ul>

                    <span class="payment">We Accept Payment Via</span>

                    <ul class="payment-option">
                        <li>
                            <img src="/assets/images/payment/payment-1.png" alt="Image">
                        </li>
                        <li>
                            <img src="/assets/images/payment/payment-2.png" alt="Image">
                        </li>
                        <li>
                            <img src="/assets/images/payment/payment-3.png" alt="Image">
                        </li>
                        <li>
                            <img src="/assets/images/payment/payment-4.png" alt="Image">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer  Area -->

<!-- Start Copy Right Area -->
<div class="copy-right-area">
    <div class="container">
        <p>© Ehay is Proudly Owned by <a href="https://envytheme.com/" target="_blank">EnvyTheme</a></p>
    </div>
</div>
<!-- End Copy Right Area -->

<!-- Start Newsletter Modal -->
<div class="popup-overlay popup-hide">
    <div class="container">
        <div class="align-middle">
            <div class="popup-body">
                <div class="popup-close">
                    <i class="ri-close-fill"></i>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="modal-newsletter">
                            <h3>Subscribe To Our Newsletter</h3>
                            <p>Sign up for our mailing list to get the latest updates & offers.</p>

                            <form class="newsletter-form" data-toggle="validator">
                                <input type="email" class="form-control" placeholder="Enter email address"
                                       name="EMAIL" required="" autocomplete="off">

                                <button class="default-btn black-btn" type="submit">
                                    Subscribe
                                </button>
                                <div id="validator-newsletter-2" class="form-result"></div>

                                <div class="agree-label">
                                    <input type="checkbox" id="chb1">
                                    <label for="chb1">
                                        Do Not Show This Popup Again
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="newsletter-img">
                            <img src="/assets/images/newsletter-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Newsletter Modal -->
<!-- Start Go Top Area -->
<div class="go-top">
    <i class="ri-arrow-up-s-fill"></i>
    <i class="ri-arrow-up-s-fill"></i>
</div>
<!-- End Go Top Area -->
