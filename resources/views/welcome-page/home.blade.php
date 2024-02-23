@extends('welcome-page.layouts.main')
@section('container')
    {{-- @if (session('showModal'))
        <script>
            $(document).ready(function(){
                $('#modal').modal('show');
            });
        </script>
    @endif --}}

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 style="color:white; margin-bottom:3%;">MyShoppu</h1>
                                        <h2>Where Every Purchase Tells a Story.</h2>
                                        <p>Shop smart, shop effortlessly. Explore trending products, enjoy exclusive deals,
                                            and experience seamless checkout with our user-friendly e-commerce app. Elevate
                                            your online shopping journey today!
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="white-button scroll-to-section">
                                            <a href="{{ route('shop') }}">Start Shopping! <i class="fab fa-google-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="assets/images/slider-dec.png" alt="" style="margin-left: 100px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h4>About <em>What We Do</em> &amp; Who We Are</h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Maintance Problems</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">24/7 Support &amp; Help</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Fixing Issues About</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Co. Development</a></h4>
                                <p>Lorem Ipsum Text</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor idunte ut
                                labore et dolore adipiscing magna.</p>
                            <div class="gradient-button">
                                <a href="#"> <i class="fa fa-user"></i> Customer Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-image">
                        <img src="assets/images/about-right-dec.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="category" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4><em>Category</em></h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-3" style="flex: 0 0 25%; box-sizing: border-box; margin-bottom: 1%;">
                        <div class="service-item first-service"
                            style="display: flex; flex-direction: column; height: 100%; border: 1px solid #ccc; margin-bottom: 20px;">
                            {{-- <div class="icon"></div> --}}
                            <h4>{{ $category->name }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($category->description, 200, '...') }}</p>
                            <div class="text-button">
                                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="item" class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>We Have The Best Pre-Order <em>Prices</em> You Can Get</h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">$12</span>
                        <h4>Standard Plan App</h4>
                        <div class="icon">
                            <img src="assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>20 TB of Storage</li>
                            <li class="non-function">Life-time Support</li>
                            <li class="non-function">Premium Add-Ons</li>
                            <li class="non-function">Fastest Network</li>
                            <li class="non-function">More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-pro">
                        <span class="price">$25</span>
                        <h4>Business Plan App</h4>
                        <div class="icon">
                            <img src="assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>50 TB of Storage</li>
                            <li>Life-time Support</li>
                            <li>Premium Add-Ons</li>
                            <li class="non-function">Fastest Network</li>
                            <li class="non-function">More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">$66</span>
                        <h4>Premium Plan App</h4>
                        <div class="icon">
                            <img src="assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>120 TB of Storage</li>
                            <li>Life-time Support</li>
                            <li>Premium Add-Ons</li>
                            <li>Fastest Network</li>
                            <li>More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Join our mailing list to receive the news &amp; latest trends</h4>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-3">
                    <form id="search" action="#" method="GET">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <fieldset>
                                    <input type="address" name="address" class="email" placeholder="Email Address..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <fieldset>
                                    <button type="submit" class="main-button">Subscribe Now <i
                                            class="fa fa-angle-right"></i></button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Contact Us</h4>
                        <p>Rio de Janeiro - RJ, 22795-008, Brazil</p>
                        <p><a href="#">010-020-0340</a></p>
                        <p><a href="#">info@company.co</a></p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">Free Apps</a></li>
                            <li><a href="#">App Engine</a></li>
                            <li><a href="#">Programming</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">App News</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">App Dev Team</a></li>
                            <li><a href="#">Digital Web</a></li>
                            <li><a href="#">Normal Apps</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>About Our Company</h4>
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright © 2022 Chain App Dev Company. All Rights Reserved.
                            <br>Design: <a href="https://templatemo.com/" target="_blank"
                                title="css templates">TemplateMo</a><br>

                            Distributed By: <a href="https://themewagon.com/" target="_blank"
                                title="Bootstrap Template World">ThemeWagon</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
