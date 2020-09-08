@extends('layouts.admin')

@section('title','Profile')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <a href="" class="btn btn-sm btn-outline-primary"><i class="fas fa-arrow-left mr-2">
                </i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-sm-6">
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
                            <label>Email </label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
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
                            <div class="form-group">
                                <label>password </label>
                                <input type="text" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Photo:</label>
                            <input type="file" class="form-controll">

                            {{-- <img src="{{$User->photo}}" alt=""> --}}
                        </div>
            </form>
        </div>
    </div>
</div>

@endsection
