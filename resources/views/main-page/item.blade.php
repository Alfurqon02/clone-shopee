@extends('main-page.layouts.main')
@section('container')
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
                                    <h2>{{ $name }}</h2>
                                    <h1 style="color:white; margin-bottom:3%;">Rp. {{ $price }}</h1>
                                    <p style="white-space: pre-wrap; word-wrap: break-word">{{ $description }}</p>
                                </div>
                                <div class="col-lg-12">
                                    <div class="white-button scroll-to-section">
                                        <a href="#contact">Start Shopping! <i class="fab fa-google-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight ms-5 mt-5" data-wow-duration="1s" data-wow-delay="0.5s" style="width: 200px; height: 200px; max-width:100%; max-height:100%;">
                            <img src="https://th.bing.com/th/id/R.d517ca7838e27df01decc9d70f292071?rik=bI4yhKuy7dDAyg&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fshoes-png-sneaker-png-transparent-image-2500.png&ehk=kyWee4brz%2frLtbcCcpd%2flVSuWY6gQv%2b7nouzn%2f%2fsues%3d&risl=&pid=ImgRaw&r=0" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
