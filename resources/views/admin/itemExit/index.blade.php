@extends('layouts.admin')

@section('title','Data Perangkat Terpasang')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<div class=" col-sm-12 col-lg-12">
    <div class="card shadow">
        <div class="card-header">
            {{-- <h5>Data Perangkat Yang Terpasang</h5> --}}
            <div class="text-right">
                <a href="{{route('export.item.exit.excel')}}" class="btn btn-sm btn-info mt-1 mb-1"><i
                        class="fas fa-file-excel mr-2"></i>export excel</a>
                <a href="{{route('exit.create')}}" class=" btn-outline-primary btn btn-sm mt-1 mb-1"><i
                        class="fas fa-plus"></i>Tambah
                    Perangkat Terpasang</a>
            </div>
        </div>
        <div class=" card-body">
            <table class=" table table-hover table-sm table-striped" id="data">
                <thead>
                    <th>No</th>
                    {{-- <th>Nama Karyawan</th> --}}
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>IP Address</th>
                    <th>IP Backbound</th>
                    <th>Aksi</th>
                </thead>
                <tfoot>
                    <th>No</th>
                    {{-- <th>Nama Karyawan</th> --}}
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>IP Address</th>
                    <th>IP Backbound</th>
                    <th>Aksi</th>
                </tfoot>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#data').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:'{!! route('data.exit') !!}',
            columns:[
                {data: 'DT_RowIndex', searchable: false, orderable: false},
                {data: 'customer', name:'customer'},
                {data: 'item', name:'item'},
                {data: 'ip_adrress', name:'ip_adrress'},
                {data: 'backbond', name:'backbond'},
                {data: 'action', name:'action'}
            ],
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.select1').select2();
    });
</script>
@endsection
