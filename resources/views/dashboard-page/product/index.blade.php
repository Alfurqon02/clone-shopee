@extends('dashboard-page.layouts.main')
@section('container')
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="app-content">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
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
                            <td>@money($item->price)</td>
                            <th>
                                <div>
                                    <a style="border: transparent" href="{{ route('item', $item->slug) }}"
                                        class="badge bg-label-info"><i class="mdi mdi-eye"></i></a>
                                    <a style="border: transparent" href="{{ route('edit.item', $item->slug) }}"
                                        class="badge bg-label-warning"><i class="mdi mdi-pencil"></i></a>
                                    <button style="border: transparent" data-bs-toggle="modal" data-id={{ $item->id }}
                                        data-bs-target="#backDropModalDelete" class="badge bg-label-danger"><i
                                            class="mdi mdi-delete"></i></button>
                                </div>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="modal fade" id="backDropModalDelete" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                    <form class="modal-content" action="/" method="POST" id="form-delete">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h4 class="modal-title" id="backDropModalTitle">Confirmation</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <p>Are you sure to delete this item?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#product').DataTable();
        });

        $('#backDropModalDelete').on('show.bs.modal', function(e) {
            var item = $(e.relatedTarget).data('id');
            console.log(item);
            $(e.currentTarget).find('#form-delete').attr('action', '/product/' + item);
        });
    </script>
@endsection
