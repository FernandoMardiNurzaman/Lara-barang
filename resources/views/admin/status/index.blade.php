@extends('layouts.admin')

@section('title', 'Status')

@section('content')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

<div class="col-md-8">
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-sm table-bordered table-hover" id="data">
                <thead>
                    <th>No</th>
                    <th>Nama Status</th>
                    <th>Tanggal dibuat</th>
                    <th width="200">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($statuses as $status)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $status->nama_status}}</td>
                        <td>{{ $status->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route("status.edit", $status->id) }}"
                                class="btn btn-sm btn-warning d-inline mr-1">
                                <i class="fas fa-edit mr-2"></i>edit
                            </a>
                            <form action="{{ route("status.destroy", $status->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash mr-2"></i>hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="card-title">
                <h5>Tambah kategori</h5>
            </div>

            <form action="{{ route("status.store") }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Status</label>
                    <input type="text" name="nama_status"
                        class="form-control @error('nama_status') is-invalid @enderror">
                    @error('nama_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-save mr-2"></i>simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
    $('#data').DataTable();
});
</script>

@endsection
