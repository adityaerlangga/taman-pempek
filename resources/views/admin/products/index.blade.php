{{-- === START => LIST: FAST REPLACE TEXT === --}}
{{-- PRODUCT_CATEGORY --}}
{{-- ProductCategory --}}
{{-- product --}}
{{-- product --}}
{{-- products --}}
{{-- Product Category --}}
{{-- Products --}}
{{-- === END => LIST: FAST REPLACE TEXT === --}}

@extends('templates.default-admin')

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
                            <h1>Products</h1>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <span>Table - Products</span>
                            <a href="/products/create" class="btn btn-primary float-end"><i class="material-icons">add_circle_outline</i> Create new product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="my-table" class="display text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $product['product_image']) }}" class="avatar avatar-xl">
                                        </td>
                                        <td>{{ $product['product_name'] }}</td>
                                        <td>{{ Str::limit($product['product_description'], 50, '...') }}</td>
                                        <td>{{ $product['product_price'] }}</td>
                                        <td>{{ $product['product_stock'] }}</td>
                                        <td>
                                            <a href="/products/edit/{{ $product['product_code'] }}" class="btn btn-sm btn-warning mx-1 my-1">Edit</a>
                                            <a href="/products/delete/{{ $product['product_code'] }}" class="btn btn-sm btn-danger mx-1 my-1 btn-delete">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
    $('#my-table').DataTable({
        responsive: true,
        "paging": true,
    });

    $('.btn-delete').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        })
    })
</script>
@endsection
