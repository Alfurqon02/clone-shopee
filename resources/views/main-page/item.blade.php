@extends('main-page.layouts.main')
@section('container')
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row mb-5 d-flex">
                            <div class="col-md-9 col-lg-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                @php
                                                    $imagePaths = explode(', ', $item->image);
                                                    // $firstImagePath = Str::before($imagePaths[0], ',');
                                                @endphp
                                                @foreach ($imagePaths as $key => $img)
                                                    <button type="button" data-bs-target="#carouselExample"
                                                        data-bs-slide-to="{{ $key }}" class="@if ($loop->first) active @endif" aria-current="true"></button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner" style="align-content: center">
                                                @foreach ($imagePaths as $key => $img)
                                                <div class="carousel-item @if ($loop->first) active @endif">
                                                    <img class="d-block" style="width: 620px; height:620px" src="{{ $img }}"/>
                                                </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExample" role="button"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExample" role="button"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-6">
                                <div class="card overflow-hidden" style="height: 659px">
                                    <h5 class="card-header" style="font-size: 50px">{{ $item->name }}</h5>
                                    <div class="ms-4 d-flex">
                                        @foreach ($item->categories as $categories)
                                            <span class="badge bg-label-primary me-2">{{ $categories->name }}</span>
                                        @endforeach
                                    </div>
                                    <p class="ms-4" style="font-size: 20px;"> @money($item->price) </p>
                                    <p class="ms-4">Stock: {{ $item->stock }}</p>
                                    <div class="card-body" id="vertical-example">
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <h5 class="card-header d-flex justify-content-between">
                                        <button onclick="history.back()" class="btn btn-dark"><i class="mdi mdi-keyboard-backspace pe-2"></i> Back</button>
                                        <a href="#" class="btn btn-success">Add to Cart</a>
                                        <a href="#" class="btn btn-primary">Buy Now!</a>
                                    </h5>
                                </div>
                            </div>

                        </div>
                        <!--/ Layout Demo -->
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
@endsection
