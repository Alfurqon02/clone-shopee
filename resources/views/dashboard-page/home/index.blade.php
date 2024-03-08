@extends('dashboard-page.layouts.main')
@section('container')
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="app-content">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">Transactions</h5>
                            </div>
                            <p class="mt-3">Hello <span class="fw-medium">{{ Auth::user()->name }}</span>, Have a great
                                day!</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-primary rounded shadow">
                                                <i class="mdi mdi-trending-up mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="small mb-1">Sales</div>
                                            <h5 class="mb-0">@money($sales)</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-success rounded shadow">
                                                <i class="mdi mdi-account-outline mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="small mb-1">Success Orders</div>
                                            <h5 class="mb-0">{{ count($orders) }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-warning rounded shadow">
                                                <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="small mb-1">Product</div>
                                            <h5 class="mb-0">{{ count($products) }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-info rounded shadow">
                                                <i class="mdi mdi-currency-usd mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="small mb-1">Sold</div>
                                            <h5 class="mb-0">{{ $amount }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row d-flex justify-content-between">
                    <a href="#sectionOrders" class="col-md col-lg-3" style="background-color: transparent;border:transparent">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>All Orders</h3>
                                <div class="card-body">
                                    <h1>{{ count($all_orders) }}</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#sectionNeedConfrim" class="col-md col-lg-3" style="background-color: transparent;border:transparent">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>Need to Confirm</h3>
                                <div class="card-body">
                                    <h1>{{ count($items) }}</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#sectionConfirmed" class="col-md col-lg-3" style="background-color: transparent;border:transparent">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>Confirmed Orders</h3>
                                <div class="card-body">
                                    <h1>{{ count($confirmed_item) }}</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#sectionPurchase" class="col-md col-lg-3" style="background-color: transparent;border:transparent">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>Your Purchase</h3>
                                <div class="card-body">
                                    <h1>23</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div id="sectionOrders" class="container-xxl flex-grow-1 container-p-y">
                <div class="col-lg">
                    <h6 class="mt-2 text-muted">All Orders</h6>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="products-area-wrapper tableView">
                                <table id="purchase" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Stock</th>
                                            <th>Buyer Name</th>
                                            <th>Amount</th>
                                            <th>Total Price</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_orders as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>{{ $item->buyer_name }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>@money($item->total_price)</td>
                                                <td><a style="border: transparent" href="#"
                                                        class="badge bg-label-info"><i class="mdi mdi-eye"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDetail{{ $item->order_id }}"></i></a>
                                                </td>
                                                <td><strong
                                                    @if($item->status == "Rejected")
                                                    style="color: red"
                                                    @else
                                                    style="color: green"
                                                    @endif
                                                    >{{ $item->status }}</strong>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalDetail{{ $item->order_id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalCenterTitle">
                                                                Detail
                                                                Orders
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="ReceiverName" disabled
                                                                        value="{{ $item->receiver_name }}">
                                                                    <label for="ReceiverName">Receiver
                                                                        Name</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->address }}">
                                                                    <label for="address">Address</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->shipment }}">
                                                                    <label for="address">Shipment</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            {{-- <button type="submit" class="btn btn-primary">Buy</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Layout Demo -->
                    </div>
                </div>
            </div>
            <div id="sectionNeedConfrim" class="container-xxl flex-grow-1 container-p-y">
                <div class="col-lg">
                    <h6 class="mt-2 text-muted">Orders Need to Confirm</h6>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="products-area-wrapper tableView">
                                <table id="item" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Stock</th>
                                            <th>Buyer Name</th>
                                            <th>Amount</th>
                                            <th>Total Price</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>{{ $item->buyer_name }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>@money($item->total_price)</td>
                                                <td><a style="border: transparent" href="#"
                                                        class="badge bg-label-info"><i class="mdi mdi-eye"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDetail{{ $item->order_id }}"></i></a>
                                                </td>
                                                <th>
                                                    <div>
                                                        <a style="color: green"
                                                            href="{{ route('order.confirm', $item->order_id) }}"
                                                            onclick="event.preventDefault(); document.getElementById('confirm-order').submit();">Confirm</a>
                                                        |
                                                        <a style="color: red" href="#">Decline</a>
                                                    </div>
                                                    <form id="confirm-order"
                                                        action="{{ route('order.confirm', $item->order_id) }}"
                                                        method="POST" class="hidden">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                </th>
                                            </tr>
                                            <div class="modal fade" id="modalDetail{{ $item->order_id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalCenterTitle">Detail
                                                                Orders
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="ReceiverName" disabled
                                                                        value="{{ $item->receiver_name }}">
                                                                    <label for="ReceiverName">Receiver Name</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->address }}">
                                                                    <label for="address">Address</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->shipment }}">
                                                                    <label for="address">Shipment</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            {{-- <button type="submit" class="btn btn-primary">Buy</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sectionConfirmed" class="container-xxl flex-grow-1 container-p-y">
                <div class="col-lg">
                    <h6 class="mt-2 text-muted">Confirmed Orders</h6>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="products-area-wrapper tableView">
                                <table id="confirmItem" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Stock</th>
                                            <th>Buyer Name</th>
                                            <th>Amount</th>
                                            <th>Total Price</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confirmed_item as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>{{ $item->buyer_name }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>@money($item->total_price)</td>
                                                <td><a style="border: transparent" href="#"
                                                        class="badge bg-label-info"><i class="mdi mdi-eye"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDetail{{ $item->order_id }}"></i></a>
                                                </td>
                                                <td><strong style="color: green">{{ $item->status }}</strong>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalDetail{{ $item->order_id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalCenterTitle">
                                                                Detail
                                                                Orders
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="ReceiverName" disabled
                                                                        value="{{ $item->receiver_name }}">
                                                                    <label for="ReceiverName">Receiver
                                                                        Name</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->address }}">
                                                                    <label for="address">Address</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->shipment }}">
                                                                    <label for="address">Shipment</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            {{-- <button type="submit" class="btn btn-primary">Buy</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Layout Demo -->
                    </div>
                </div>
            </div>
            <div id="sectionPurchase" class="container-xxl flex-grow-1 container-p-y">
                <div class="col-lg">
                    <h6 class="mt-2 text-muted">Your Purchase</h6>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="products-area-wrapper tableView">
                                <table id="purchase" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Stock</th>
                                            <th>Buyer Name</th>
                                            <th>Amount</th>
                                            <th>Total Price</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confirmed_item as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>{{ $item->buyer_name }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>@money($item->total_price)</td>
                                                <td><a style="border: transparent" href="#"
                                                        class="badge bg-label-info"><i class="mdi mdi-eye"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDetail{{ $item->order_id }}"></i></a>
                                                </td>
                                                <td><strong style="color: green">{{ $item->status }}</strong>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalDetail{{ $item->order_id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalCenterTitle">
                                                                Detail
                                                                Orders
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="ReceiverName" disabled
                                                                        value="{{ $item->receiver_name }}">
                                                                    <label for="ReceiverName">Receiver
                                                                        Name</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline mb-4">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->address }}">
                                                                    <label for="address">Address</label>
                                                                </div>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="form-floating form-floating-outline">
                                                                    <input class="form-control" type="text"
                                                                        name="address" disabled
                                                                        value="{{ $item->shipment }}">
                                                                    <label for="address">Shipment</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            {{-- <button type="submit" class="btn btn-primary">Buy</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Layout Demo -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#item').DataTable();
            $('#confirmItem').DataTable();
            $('#purchase').DataTable();
        });
    </script>
@endsection
