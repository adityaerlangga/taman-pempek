@extends('templates.default-admin')

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Halaman Home</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            {{-- <div class="card-header">
                                <div class="card-title">1</div>
                            </div> --}}
                            <div class="card-body">
                                <form action="">
                                    <div class="input-field mb-4">
                                        <label class="form-label">Header</label>
                                        <input type="text" class="form-control" value="Easy to Clean House & Office">
                                    </div>
                                    <div class="input-field mb-4">
                                        <label class="form-label">Sub Header</label>
                                        <input type="text" class="form-control" value="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, culpa!">
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
@endsection
