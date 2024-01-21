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
                        <div class="card-title">Detail Pesanan #ID-82183645</div>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Order ID</td>
                                <td>:</td>
                                <td>#ID-82183645</td>
                            </tr>
                            <tr>
                                <td>Tanggal Order</td>
                                <td>:</td>
                                <td>2020-12-12 12:12:12</td>
                            </tr>
                            <tr>
                                <td>Jadwal Cleaning</td>
                                <td>:</td>
                                <td>2020-12-12 12:12:12</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>Dijadwalkan</td>
                            </tr>
                            <tr>
                                <td>Nama Customer</td>
                                <td>:</td>
                                <td>John Doe</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin Customer</td>
                                <td>:</td>
                                <td>Laki-laki</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>example@gmail.com</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>081234567890</td>
                            </tr>
                            <tr>
                                <td>Alamat Service</td>
                                <td>:</td>
                                <td>Jl. Raya Bogor KM 30</td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td>Daily Cleaning 1 Jam</td>
                            </tr>
                            {{-- total --}}
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>Rp 100.000</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
</script>
@endsection
