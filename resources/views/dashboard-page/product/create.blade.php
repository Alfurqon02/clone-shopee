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
                                <h5 class="mb-0">Add Item</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('store.item') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating form-floating-outline mb-4">
                                        <div class="imgPreview"> </div>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="image[]" type="file" class="form-control" id="image" multiple/>
                                        <label for="image">Image</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Your Item Name" />
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select multiple name="category[]" class="form-select" id="category[]" style="height: 300%">
                                            <option disabled>Select the category you need</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="category">Category</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="price" type="number" id="price" class="form-control"
                                            placeholder="Item Price" />
                                        <label for="price">Price</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input name="stock" type="number" id="stock" class="form-control"
                                            placeholder="Item Stock" />
                                        <label for="stock">Stock</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select multiple name="shipment[]" id="shipment[]" class="form-select"style="height: 300%">
                                            <option disabled>Select the shipment you need</option>
                                            @foreach ($shipments as $shipment)
                                            <option value="{{ $shipment->id }}">{{ $shipment->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="shipment">Shipment</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-4">
                                        <textarea name="description" id="description" class="form-control" placeholder="This is your item description"
                                            style="height: 60px"></textarea>
                                        <label for="description">Description</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Merged -->
                    {{-- <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Basic with Icons</h5>
                                <small class="text-muted float-end">Merged input group</small>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="input-group input-group-merge mb-4">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="mdi mdi-account-outline"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname"
                                            placeholder="Full Name" aria-label="Full Name"
                                            aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                    <div class="input-group input-group-merge mb-4">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="mdi mdi-office-building-outline"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Company" aria-label="Company"
                                            aria-describedby="basic-icon-default-company2" />
                                    </div>
                                    <div class="mb-4">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                            <input type="text" id="basic-icon-default-email" class="form-control"
                                                placeholder="Email" aria-label="Email"
                                                aria-describedby="basic-icon-default-email2" />
                                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                                        </div>
                                        <div class="form-text">You can use letters, numbers & periods</div>
                                    </div>
                                    <div class="input-group input-group-merge mb-4">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="mdi mdi-phone"></i></span>
                                        <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                            placeholder="Phone No" aria-label="Phone No"
                                            aria-describedby="basic-icon-default-phone2" />
                                    </div>
                                    <div class="input-group input-group-merge mb-4">
                                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                                class="mdi mdi-message-outline"></i></span>
                                        <textarea id="basic-icon-default-message" class="form-control" placeholder="Message" aria-label="Message"
                                            aria-describedby="basic-icon-default-message2" style="height: 60px"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                    </div> --}}
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


