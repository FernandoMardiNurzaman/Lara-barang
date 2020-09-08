@extends('layouts.admin')
@section('title','Detail Data Barang')

@section('content')
<div class=" col-lg-12 col-sm-12">
    <div class="card shadow">
        <div class="card-header">
            <a href="{{route('item.index')}}" class="btn btn-outline-primary btn-sm"></a>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-sm-6">
                    <div class=" form-group">
                        <strong>Gambar :</strong>
                        <img src="{{ Storage::url($item->photo) }}" width="400">
                    </div>
                    <div class=" form-group">
                        <strong>Kode barang:</strong>
                        {{$item->code}}
                    </div>
                    <div class=" form-group">
                        <strong>Nama Barang:</strong>
                        {{$item->item_name}}
                    </div>
                    <div class=" form-group">
                        <strong>Kategori Barang:</strong>
                        {{$item->category_id}}
                    </div>
                    <div class=" form-group">
                        <strong>Kondisi Barang:</strong>
                        {{$item->condition_id}}
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class=" form-group">
                        <strong>Harga Barang:</strong>
                        {{$item->item_name}}
                    </div>
                    <div class=" form-group">
                        <strong>Asal Barang:</strong>
                        {{$item->fromWhere}}
                    </div>
                    <div class=" form-group">
                        <strong>Kerusakan Barang:</strong>
                        {{$item->fault_items}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
