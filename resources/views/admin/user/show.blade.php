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

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">

                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><span class="badge badge-info">{{ $user->position }}</span></td>
                        </tr>

                    </table>

                    <a href="{{ route('reset.password', $user->id) }}" class="btn btn-danger mt-2"><i
                            class="fas fa-key mr-2"></i>Reset password</a>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="{{ ($user->image_user === null) ? asset('assets/images/default.png') : asset('assets/images/' .  $user->image_user)}}"
                        width="500" alt="img">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
