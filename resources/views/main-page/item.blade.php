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
                        <div class="app-content">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
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
                                                        data-bs-slide-to="{{ $key }}"
                                                        class="@if ($loop->first) active @endif"
                                                        aria-current="true"></button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner" style="align-content: center">
                                                @foreach ($imagePaths as $key => $img)
                                                    <div
                                                        class="carousel-item @if ($loop->first) active @endif">
                                                        <img class="d-block" style="width: 620px; height:620px"
                                                            src="{{ $img }}" />
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
                                        <button onclick="history.back()" class="btn btn-dark"><i
                                                class="mdi mdi-keyboard-backspace pe-2"></i> Back</button>
                                        <button data-bs-toggle="modal" data-bs-target="#modalCenter" type="button"
                                            class="btn btn-success"
                                            @if ($item->user_id == Auth::user()->id)
                                            disabled
                                            @endif>Add to Cart</button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalBuy"
                                            class="btn btn-primary"
                                            @if ($item->user_id == Auth::user()->id)
                                            disabled
                                            @endif>Buy Now!</button>
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

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalCenterTitle">Add to Cart</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store.cart', $item->slug) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col me-4">
                                <div class="input-group d-flex justify-content-between">
                                    <span class="input-group-btn">
                                        <button onclick="Adecrement()" type="button" class="btn btn-outline-danger"
                                            data-type="minus" data-field="">
                                            <span class="mdi mdi-minus"></span>
                                        </button>
                                    </span>
                                    <input style="height: 100%;" name="quantity" type="number" id="amount"
                                        class="form-control ms-1 me-1" min="1" value="1" />
                                    <span class="input-group-btn">
                                        <button onclick="Aincrement()" type="button" class="btn btn-outline-success"
                                            data-type="plus" data-field="">
                                            <span class="mdi mdi-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalBuy" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalCenterTitle">Buy Now</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('buy.item', $item->slug) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col me-4">
                                <div class="input-group">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="receiver" type="text" id="receiver" class="form-control"
                                            placeholder="Receiver Name" />
                                        <label for="receiver">Receiver Name</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="address" type="text" id="address" class="form-control"
                                            placeholder="Address" />
                                        <label for="Address">Address</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select class="form-select" name="shipment_id" id="shipment_id" class="form-control">
                                            @foreach ($item->shipments as $shipment)
                                            <option value="{{ $shipment->id }}">{{ $shipment->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="shipment_id">Shipment</label>
                                        {{-- <input name="shipment" type="select" id="shipment" class="form-control"
                                            placeholder="Choose Shipment" multiple /> --}}
                                    </div>
                                </div>
                                <div class="input-group d-flex justify-content-between">
                                    <span class="input-group-btn">
                                        <button onclick="Qdecrement()" type="button" class="btn btn-outline-danger"
                                            data-type="minus" data-field="">
                                            <span class="mdi mdi-minus"></span>
                                        </button>
                                    </span>
                                    <input style="height: 100%;" name="quantity" type="number" id="quantity"
                                        class="form-control ms-1 me-1" min="1" value="1" />
                                    <span class="input-group-btn">
                                        <button onclick="Qincrement()" type="button" class="btn btn-outline-success"
                                            data-type="plus" data-field="">
                                            <span class="mdi mdi-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Buy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function Qincrement() {
        let amountInput = document.querySelector('#quantity');
        amountInput.value = parseInt(amountInput.value) + 1;
    }

    function Qdecrement() {
        let amountInput = document.querySelector('#quantity');
        let currentValue = parseInt(amountInput.value);

        if (currentValue > 1) {
            amountInput.value = currentValue - 1;
        }
    }
    function Aincrement() {
        let amountInput = document.querySelector('#amount');
        amountInput.value = parseInt(amountInput.value) + 1;
    }

    function Adecrement() {
        let amountInput = document.querySelector('#amount');
        let currentValue = parseInt(amountInput.value);

        if (currentValue > 1) {
            amountInput.value = currentValue - 1;
        }
    }
    // function increment1() {
    //     let amountInput = document.getElementById('quantity');
    //     amountInput.value = parseInt(amountInput.value) + 1;
    // }

    // function decrement1() {
    //     let amountInput = document.getElementById('quantity');
    //     let currentValue = parseInt(amountInput.value);

    //     if (currentValue > 1) {
    //         amountInput.value = currentValue - 1;
    //     }
    // }
</script>
