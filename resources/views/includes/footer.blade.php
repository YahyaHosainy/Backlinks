<!-- Start Footer Section -->

<!-- Banner -->
@if(isset($banner) && $banner != null)
    <div class="d-flex items-center justify-center mb-4 mt-4" id="admin-banner">
    </div>


<script>
    function injectBanner() {

        let parent = document.getElementById("admin-banner");
        if(parent)
        parent.insertAdjacentHTML('beforeend','{!! $banner->content !!}')

    }
    // injectBanner()
    setTimeout(injectBanner, 3000);
</script>
@endif

<!-- /Banner -->

<section class="footer-section ptb-100" style="background-color: #304674 !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6  px-md-5">
                <div class="footer-area">
                    <div class="footer-heading">
                        <span>About Us</span>
                    </div>

                    <p style="text-align:justify">Backlinks Services is an online platform for Premium SEO Links selling service for small, medium and large online business owners and entrepreneurs of startup company Worldwide & Multi-Lingual Keywords</p>
                    <ul class="footer-social">
                        <li>
                            <a href="https://www.facebook.com/WebSeoDirect" class="bg-3955bc" target="_blank">
                                <i class="flaticon-facebook-logo"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://twitter.com/WebSEO_Direct" class="bg-1da1f2" target="_blank">
                                <i class="flaticon-twitter"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/company/67933148/" class="bg-0273af" target="_blank">
                                <i class="flaticon-linkedin-letters"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item-area">
                    <div class="footer-heading">
                        <span>Important Links</span>
                    </div>

                    <ul class="footer-quick-links">
                        <li><a rel="noreferrer" href="/faq">FAQs</a></li>
                        <li><a rel="noreferrer" href="/privacy-policy">Privacy Policy</a></li>
                        <li><a rel="noreferrer" href="/terms-of-use">Terms Of Use</a></li>
                        <li><a rel="noreferrer" href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <!-- <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item-area">
                    <div class="footer-heading">
                        <span>Featured Service</span>
                    </div>

                    <ul class="footer-quick-links">
                        <li><a href="#">SEO Marketing</a></li>
                        <li><a href="#">SEO Services</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Pay-Per-Click</a></li>
                        <li><a href="#">Social Media</a></li>
                    </ul>
                </div>
            </div> -->

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-heading">
                    <span>Contact</span>
                </div>

                <div class="footer-info-contact">
                    <i class="flaticon-call-answer"></i>
                    <span>Phone</span>
                    <span>+1 (484) 473-1930</span>
                </div>

                <div class="footer-info-contact">
                    <i class="flaticon-envelope"></i>
                    <span>Email</span>
                    <span><a href="#">admin@webseo.direct</a></span>
                </div>

                <div class="footer-info-contact">
                    <i class="flaticon-placeholder-filled-point"></i>
                    <span>Address</span>
                    <span>30 N Gould St, Wyoming, USA</span>
                </div>
            </div>
        </div>
        <div class>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 px-5">
                    <img class="w-50" src="{{ asset('assets/img/footer/payment-logo.png')}}" alt="">
                </div>
            </div>
        </div>

        <div class="default-animation">
            <div class="shape-img1"><img src="{{ asset('assets/img/shape/12.svg') }}" alt="image">
            </div>
            <div class="shape-img2"><img src="{{ asset('assets/img/shape/13.svg') }}" alt="image">
            </div>
            <div class="shape-img3"><img src="{{ asset('assets/img/shape/14.png') }}" alt="image">
            </div>
            <div class="shape-img4"><img src="{{ asset('assets/img/shape/15.png') }}" alt="image">
            </div>
            <div class="shape-img5"><img src="{{ asset('assets/img/shape/2.png') }}" alt="image">
            </div>
        </div>
</section>
<!-- End Footer Section -->

<!-- Start Go Top Section -->
<div class="go-top">
    <i class="fas fa-chevron-up"></i>
    <i class="fas fa-chevron-up"></i>
</div>
<!-- End Go Top Section -->
