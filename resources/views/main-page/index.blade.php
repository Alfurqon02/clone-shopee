@extends('layouts.main')
@section('container')
    {{-- <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s"> --}}
        <div class="container">
            <div class="row">
                <div class="row" style="margin-top: 120px">
                @foreach ($items as $item)
                <div class="col-lg-3">
                    <div class="service-item" style="margin-bottom: 30px">
                        <div class="mb-3" style="width: 200px; height: 200px; max-width:100%; max-height:100%"><img src="{{ $item->image }}" alt=""></div>
                        <h4 class="mb-0">{{ Str::limit($item->name, 19, $end = '...') }}</h4>
                        @foreach ($item->categories as $category)
                        <div class="categoryLabel">
                            <p>{{ $category->name }}</p>
                        </div>
                        @endforeach
                        <div class="text-button">
                            <a href="{{ route('item', $item->slug) }}">Detail <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    {{-- </div> --}}
    @endsection
