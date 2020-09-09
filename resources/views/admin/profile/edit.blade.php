@extends('layouts.admin')

@section('title','Profile')

@section('content')

<div class="col-sm-6">
    <div class="card shadow">
        <div class="card-header">
            <a href="" class="btn btn-sm btn-outline-primary"><i class="fas fa-arrow-left mr-2">
                </i>Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route("update.profile.information") }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama </label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', \Auth::user()->name) }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email </label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', \Auth::user()->email) }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>jenis kelamin</label>
                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                        <option value="">--pilih--</option>
                        <option value="laki-laki" {{ (\Auth::user()->gender === "laki-laki") ? 'selected' : '' }}>
                            laki-laki
                        </option>
                        <option value="perempuan" {{ (\Auth::user()->gender === "perempuan") ? 'selected' : '' }}>
                            perempuan
                        </option>
                        <option value="lainnya" {{ (\Auth::user()->gender === "lainnya") ? 'selected' : '' }}>
                            lainnya</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <span class="form-control">{{ \Auth::user()->position }}</span>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">ubah</button>
                </div>


            </form>

        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="card shadow">
        <div class="card-header">
            Update foto profile
        </div>
        <div class="card-body">

            <form action="{{ route('update.profile.image') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="file" name="image_user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Foto sebelumnya</label>
                    <br>
                    <img src="{{ (\Auth::user()->image_user === null) ? asset('assets/images/default.png') : asset('assets/images/' .  \Auth::user()->image_user)}}"
                        alt="img" width="200" class="mb-3" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">ubah</button>
                </div>
            </form>

        </div>
    </div>

    <div class="card shadow mt-3">
        <div class="card-header">
            Update password
        </div>

        <form action="{{ route('update.profile.password') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Password lama</label>
                    <input type="text" name="oldpassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password baru</label>
                    <input type="text" name="newpassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">ubah</button>
                </div>
        </form>

    </div>
</div>


</div>

@endsection
