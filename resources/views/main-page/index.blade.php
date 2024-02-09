@extends('main-page.layouts.main')
@section('container')
    {{-- <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s"> --}}
        <div class="container">
            <div class="row">
                <div class="row" style="margin-top: 120px">
                @foreach ($items as $item)
                <div class="col-lg-3">
                    <div class="service-item" style="margin-bottom: 30px">
                        <div class="mb-3" style="width: 200px; height: 200px; max-width:100%; max-height:100%"><img src="https://th.bing.com/th/id/R.d517ca7838e27df01decc9d70f292071?rik=bI4yhKuy7dDAyg&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fshoes-png-sneaker-png-transparent-image-2500.png&ehk=kyWee4brz%2frLtbcCcpd%2flVSuWY6gQv%2b7nouzn%2f%2fsues%3d&risl=&pid=ImgRaw&r=0" alt=""></div>
                        <h4>{{ $item->name }}</h4>
                        @foreach ($item->categories as $category)
                            <p>{{ $category->name }}</p>
                        @endforeach
                        <div class="text-button">
                            <a href="#">Detail <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    {{-- </div> --}}
    @endsection
