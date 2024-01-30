{{-- === START => LIST: FAST REPLACE TEXT === --}}
{{-- PRODUCT --}}
{{-- Product --}}
{{-- product --}}
{{-- product --}}
{{-- products --}}
{{-- Product --}}
{{-- === END => LIST: FAST REPLACE TEXT === --}}

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
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Edit Product</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="/products/update" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_code"
                                        value="{{ $product['product_code'] }}">
                                    <div class="input-field mb-4">
                                        <label class="form-label">Product Photo</label>
                                        <div class="avatar avatar-xxl m-r-xs d-block @if ($product['product_image'] == null) hidden @endif mb-2">
                                            <img class="avatar-image" src="{{ asset('storage/' . $product['product_image']) }}"
                                                alt="product-photo">
                                        </div>
                                        <input type="file" class="form-control input-image" accept=".jpg,.png,.jpeg">
                                        <input type="hidden" name="product_image">
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label required">Product Category</label>
                                        <select class="form-select" name="product_category_code">
                                            <option value="" selected>Choose product category</option>
                                            @foreach ($product_categories as $item)
                                                <option value="{{ $item['product_category_code'] }}" @if ($product['product_category_code'] == $item['product_category_code']) selected @endif>{{ $item['product_category_name'] }}</option>

                                            @endforeach
                                        </select>
                                        @error('product_category_code')
                                            <div style="color: red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label required">Product Name</label>
                                        <input type="text" name="product_name" class="form-control"
                                            placeholder="Product Name" value="{{ old('product_name', $product['product_name']) }}">
                                        @error('product_name')
                                            <div style="color: red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label required">Product Price</label>
                                        <input type="number" name="product_price" class="form-control"
                                            placeholder="Product Price" value="{{ old('product_price', $product['product_price']) }}">
                                        @error('product_price')
                                            <div style="color: red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label required">Product Stock</label>
                                        <input type="number" name="product_stock" class="form-control"
                                            placeholder="Product Stock" value="{{ old('product_price', $product['product_stock']) }}">
                                        @error('product_stock')
                                            <div style="color: red">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label">Product Description</label>
                                        <textarea name="product_description" class="form-control">{{ $product['product_description'] }}</textarea>
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
                        $('input[name="product_image"]').val(e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
