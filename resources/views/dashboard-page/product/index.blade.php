@extends('dashboard-page.layouts.main')
@section('container')
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="app-content">
            @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            @endif
    </div>
            <div class="app-content-header d-flex align-items-center justify-content-between">
                <h1 class="app-content-headerText" style="color: black">Your Products</h1>
                <a href="{{ route('add.item') }}" class="btn btn-dark"><i class="mdi mdi-plus"></i>Add Item</a>
            </div>
            <div class="products-area-wrapper tableView">
                <table id="product" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Sold</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @foreach ($item->categories as $index => $category)
                                        {{ $category->name }}
                                        @if ($index < count($item->categories) - 1)
                                            |
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->stock }}</td>
                                <td></td>
                                <td>{{ $item->price }}</td>
                                <th></th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#product').DataTable();
        });
    </script>
@endsection


