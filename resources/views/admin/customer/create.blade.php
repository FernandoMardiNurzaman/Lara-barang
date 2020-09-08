@extends('layouts.admin')

@section('title', 'Data Pelanggan')

@section('content')
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header">
            <div class="float-right mt-2 mb-2">
                <a href="{{ route("customer.index") }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route("customer.store") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="customer_name"
                                class="form-control @error('customer_name') is-invalid @enderror"
                                value="{{ old('customer_name') }}">
                            @error('customer_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="addrees"
                                class="form-control @error('addrees') is-invalid @enderror"
                                value="{{ old('addrees') }}">
                            @error('addrees')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bandwith</label>
                            <input type="text" name="bandwith"
                                class="form-control @error('bandwith') is-invalid @enderror" value="{{ old('price') }}">
                            @error('bandwith')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Pembayaran</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tinggi Tower</label>
                            <input type="text" name="height_tower"
                                class="form-control @error('height_tower') is-invalid @enderror"
                                value="{{ old('height_tower') }}">
                            @error('height_tower')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan Pelanggan</label>
                            <input type="text" name="informasion"
                                class="form-control @error('informasion') is-invalid @enderror"
                                value="{{ old('informasion') }}">
                            @error('informasion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>

                    <button type="reset" class="btn btn-warning btn-sm">
                        <i class="fas fa-undo mr-2"></i>Reset
                    </button>

                </div>


            </form>

        </div>
    </div>
</div>
@endsection
