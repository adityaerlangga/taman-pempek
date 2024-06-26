@extends('templates.default-admin')

@section('css')
    <style>
        .avatar-xxl {
            width: 150px;
            height: 150px;
        }

        .hidden {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                @if (session('success'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Edit Product Category</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="/product_categories/update" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_category_code"
                                        value="{{ $product_category['product_category_code'] }}">
                                    <div class="input-field mb-4">
                                        <label class="form-label">Product Category Photo</label>
                                        <div
                                            class="avatar avatar-xxl m-r-xs d-block @if ($product_category['product_category_image'] == null) hidden @endif mb-2">
                                            <img class="avatar-image"
                                                src="{{ asset('storage/' . $product_category['product_category_image']) }}"
                                                alt="product-photo">
                                        </div>
                                        <input type="file" class="form-control input-image" accept=".jpg,.png,.jpeg">
                                        <input type="hidden" name="product_category_image">
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label required">Product Category Name</label>
                                        <input type="text" name="product_category_name" class="form-control"
                                            placeholder="Product Category Name"
                                            value="{{ $product_category['product_category_name'] }}">
                                        @error('product_category_name')
                                            <div style="color: red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label">Product Category Description</label>
                                        <input type="text" name="product_category_description" class="form-control"
                                            placeholder="Product Category Description"
                                            value="{{ $product_category['product_category_description'] }}">
                                    </div>

                                    <div class="input-field mb-4">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            // Show product category image preview
            $('.input-image').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.avatar').removeClass('hidden');
                        $('.avatar-image').attr('src', e.target.result);
                        $('input[name="product_category_image"]').val(e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
