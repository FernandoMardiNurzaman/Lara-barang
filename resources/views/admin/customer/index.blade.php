@extends('layouts.admin')

@section('title', 'Pelanggan')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

<div class="col-md-12 col-lg-12">
    <div class="card shadow">
        <div class="card-body">
            <div class="text-right mt-2 mb-2">
                <a href="{{ route("customer.create") }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i>Tambah Pelanggan
                </a>
            </div>
            <table class="table table-hover table-bordered" id="data">
                <thead>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Bandwith</th>
                    <th>Bayaran</th>
                    <th>Tinggi Tower</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>

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
            ajax:'{!! route('customer.data') !!}',
            columns:[
                {data: 'DT_RowIndex', searchable: false, orderable: false},
                {data: 'customer_name', name:'customer_name'},
                {data: 'addrees', name:'addrees'},
                {data: 'bandwith', name:'bandwith'},
                {data: 'price', name:'price'},
                {data: 'height_tower', name:'height_tower'},
                {data: 'informasion', name:'informasion'},
                {data: 'action', name:'action'},
            ],
        });
</script>
@endsection
