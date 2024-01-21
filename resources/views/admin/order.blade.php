@extends('templates.default-admin')

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Orders</h1>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Table Pesanan</div>
                    </div>
                    <div class="card-body">
                        <table id="my-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Order</th>
                                    <th>Jadwal Cleaning</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $status = ['Menunggu Pembayaran', 'Menunggu Konfirmasi', 'Sedang Dikerjakan', 'Selesai'];
                                @endphp
                                @for ($i = 1; $i <= 100; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $faker->dateTimeBetween('-2 weeks', 'now')->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $faker->dateTimeBetween('+2 days', '2 weeks')->format('Y-m-d H:i:s') }}</td>
                                    <td>Daily Cleaning 1 Jam</td>
                                    <td>{{ $faker->name }}</td>
                                    <td>{{ $faker->phoneNumber }}</td>
                                    <td>{{ $status[rand(0, 3)] }}</td>
                                    <td>
                                        <a href="/order/detail/{{ $i }}" class="btn btn-sm btn-primary mx-1 my-1">Detail</a>
                                        <a href="#" class="btn btn-sm btn-warning mx-1 my-1">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger mx-1 my-1 btn-delete">Hapus</a>
                                    </td>
                                </tr>
                                @endfor
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

    $('.btn-delete').on('click', function(){
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
