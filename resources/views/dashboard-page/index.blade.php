@extends('dashboard-page.layouts.main')
@section('container')
    <!-- partial:index.partial.html -->
    <div class="app-container">
        @include('dashboard-page.layouts.sidebar')
        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText" style="color: black">Products</h1>
                <button class="app-content-headerButton">Add Product</button>
            </div>
            <div class="products-area-wrapper tableView mt-5">
                <table id="product" class="table table-striped" style="width:100%; color:black">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Price</th>
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
                                <td>{{ $item->price }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
