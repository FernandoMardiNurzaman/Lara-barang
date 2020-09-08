@extends('layouts.admin')

@section('title', 'User')


@section('content')
{{-- <img src="{{ asset('storage/image/default.jpg') }}" alt=""> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

<div class="col-md-12 col-lg-12">
    <div class="card ">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ route("user.create") }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i>Tambah Pelanggan
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="data">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->position}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->email}}</td>
                    <td><img src="{{asset('storage/' . $user->image_user)}}" alt="" width="80"></td>
                    <td>

                        <form action="{{ route("user.destroy", $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data ini?')">
                                <i class="fas fa-trash mr-2"></i>hapus
                            </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $('#data').DataTable({
        processing: true,
            serverSide: true,
            responsive: true,
            ajax:'{!! route('user.data') !!}',
            columns:[
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'position', name:'position'},
                {data: 'gender', name:'gender'},
                {data: 'email', name:'email'},
                {data: 'action', name:'action'}
            ],
        });
</script>
@endsection
