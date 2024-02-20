@extends('dashboard-page.layouts.main')
@section('container')
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="app-content">

            <div class="container-xxl flex-grow-1 container-p-y">
                <button class="btn btn-dark mb-3"><i class="mdi mdi-keyboard-backspace"></i></button>

                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Edit Item</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update.item',$item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-floating form-floating-outline mb-4">
                                        <div class="imgPreview"> </div>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="image[]" type="file" class="form-control" id="image" multiple/>
                                        <label for="image">Image</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Your Item Name" value="{{ old('name', $item->name) }}"/>
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select multiple name="category[]" class="form-select selectpicker" id="category[]" style="height: 300%">
                                            <option disabled>Select the category you need</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="category">Category</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="price" type="number" id="price" class="form-control"
                                            placeholder="Item Price" value="{{ old('price', $item->price) }}"/>
                                        <label for="price">Price</label>
                                    </div>
                                    <input type="hidden" name="slug" id="slug" value="">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="stock" type="number" id="stock" class="form-control"
                                            placeholder="Item Stock" value="{{ old('stock', $item->stock) }}"/>
                                        <label for="stock">Stock</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select name="shipment" id="shipment" class="form-select">
                                            <option value="1">COD</option>
                                            <option value="2">Cash</option>
                                        </select>
                                        <label for="shipment">Shipment</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <textarea name="description" id="description" class="form-control" placeholder="This is your item description"
                                            style="height: 60px">{{ old('description', $item->description) }}</textarea>
                                        <label for="description">Description</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#product').DataTable();
        });

        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#image').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });
    </script>
@endsection


