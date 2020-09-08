@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header">
            <div class="float-right mt-2 mb-2">
                <a href="{{ route("user.index") }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route("user.store") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}">
                            @error('addrees')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="position" class="form-control @error('position') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                <option value="Manager">Manager</option>
                                <option value="karyawan">Karyawan</option>
                                <option value="magang">Magang</option>
                            </select>
                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>jenis kelamin</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                                <option value="lainnya">lainnya</option>
                            </select>
                            @error('gender')
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
