@extends('layouts.admin')

@section('title', 'Data Barang')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

<div class="col-md-12 col-lg-12">
    <div class="card shadow">
        <div class="card-header">
            <div class="text-right mt-2 mb-2">
                <div class="text-right">
                    <a href="{{route('export.item.excel')}}" class="btn btn-sm btn-info mt-1 mb-1"><i
                            class="fas fa-file-excel mr-2"></i>export excel</a>
                    <a href="{{ route("item.create") }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus mr-2"></i>Tambah barang
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">

            <table class="table table-hover table-bordered table-sm" id="data">
                <thead>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Asal Perangkat</th>
                    <th>Kerusakan</th>
                    {{-- <th>Gambar</th> --}}
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
            ajax:'{!! route('get.item.data') !!}',
            columns:[
                {data: 'DT_RowIndex', searchable: false, orderable: false},
                {data: 'code', name: 'code'},
                {data: 'item_name', name:'iteam_name'},
                {data: 'price', name:'price'},
                {data: 'fromWhere', name:'fromWhere'},
                {data: 'fault_items', name:'fault_items'},
                {data: 'action', name:'action'}
            ],
        });
</script>
@endsection
