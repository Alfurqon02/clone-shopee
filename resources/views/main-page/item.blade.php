@extends('layouts.main')
@section('container')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight me-5" data-wow-duration="1s" data-wow-delay="0.5s" style="width: 200px; height: 200px; max-width:100%; max-height:100%;">
                            <img src="{{ asset($image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="ms-5 left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>{{ $name }}</h3>
                                    <h3 style="-webkit-text-stroke:1px rgb(0, 0, 0); color:white; margin-bottom:3%;">Rp. {{ $price }}</h3>
                                    <textarea rows="12" cols="75" style="resize: none;
                                     white-space: pre-wrap; word-wrap: break-word" disabled>{{ $description }}</textarea>
                                </div>
                                <div class="col-lg-12">
                                    <div class="white-button scroll-to-section mt-3">
                                        <a href="#contact">Buy it now!</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
