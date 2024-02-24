@extends('dashboard-page.layouts.main')
@section('container')
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="app-content">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
            @endif
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-5 d-flex">
                <div class="card overflow-hidden" style="height: 659px">
                    <h5 class="card-header" style="font-size: 50px">Your Carts</h5>
                    <div class="ms-4 d-flex">
                        {{-- @foreach ($item->categories as $categories)
                                    <span class="badge bg-label-primary me-2">{{ $categories->name }}</span>
                                @endforeach --}}
                    </div>
                    {{-- <p class="ms-4" style="font-size: 20px;"> @money($item->price) </p> --}}
                    {{-- <p class="ms-4">Stock: {{ $item->stock }}</p> --}}
                    <div class="card-body" id="vertical-example">
                        @foreach ($items as $item)
                            @php
                                $imagePaths = explode(', ', $item->image);
                                $firstImagePath = Str::before($imagePaths[0], ',');
                            @endphp
                            <div class="d-flex">
                                <div class="form-check mb-auto" style="display: block;">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                </div>
                                <img style="width: 100px; height: 100px" src="{{ $firstImagePath }}" alt="">
                                <div class="ms-2">
                                    <p style="font-size: 40px">{{ $item->name }}</p>
                                    {{-- <p>{{ $item->user_name }}</p> --}}
                                    <p style="color: #9055FD">@money($item->price)</p>
                                </div>
                                <div>
                                    <div class="col-lg-2 me-4"
                                        style="display:block; position: absolute; right: 0px; float: right;">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button onclick="decrement()" type="button" class="btn btn-outline-danger"
                                                    data-type="minus" data-field="">
                                                    <span class="mdi mdi-minus"></span>
                                                </button>
                                            </span>
                                            <input style="height:70%" name="amount" type="number" id="amount"
                                                class="form-control ms-1 me-1" min="0" value="{{ $item->quantity }}" />
                                            <span class="input-group-btn">
                                                <button onclick="increment()" type="button" class="btn btn-outline-success"
                                                    data-type="plus" data-field="">
                                                    <span class="mdi mdi-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    {{-- <input type="number" class="mt-5 me-5" style="display:block; position: absolute; right: 0px; float: right;"></input> --}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <h5 class="card-header ms-auto">
                        {{-- <button onclick="history.back()" class="btn btn-dark"><i
                                class="mdi mdi-keyboard-backspace pe-2"></i> Back</button> --}}
                        <a href="#" class="btn btn-primary">Checkout</a>
                    </h5>
                </div>
            </div>
            <!--/ Layout Demo -->
        </div>
    </div>
@endsection
<script>
    function increment() {
        let amountInput = document.getElementById('amount');
        amountInput.value = parseInt(amountInput.value) + 1;
    }

    function decrement() {
        let amountInput = document.getElementById('amount');
        let currentValue = parseInt(amountInput.value);

        if (currentValue > 0) {
            amountInput.value = currentValue - 1;
        }
    }
</script>
