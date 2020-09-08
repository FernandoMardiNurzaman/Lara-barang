@extends('layouts.admin')
@section('title','Detail Data Barang')

@section('content')

<div class=" col-sm-8">
    <div class="card shadow">
        <div class=" card-header">
            <div class=" mt-1 mb-1">
                <h4>Bagian Photo</h4>
            </div>
        </div>
        <div class="card-body">
            <img src="{{asset('uploads/images/' . $item->photo)}}" width="600">
        </div>
        <div class=" card-footer">
            <a href="{{route('item.index')}}" class="btn btn-outline-primary btn-sm "><i
                    class="fas fa-arrow-left mr-2"></i>Kembali</a>
        </div>
    </div>
</div>
<div class=" col-sm-4 col-lg-4">
    <div class="card shadow" width="">
        <div class=" card-header">
            <h4>Bagian Data Detail</h4>
        </div>
        <div class=" card-body">
            <table class="table">
                <tr>
                    <th width="200">Nama Barang :</th>
                    <td>{{$item->item_name}}</td>
                </tr>
                <tr>
                    <th>Kode Barang :</th>
                    <td>{{$item->code}}</td>
                </tr>
                <tr>
                    <th>Kategori :</th>
                    <td>{{$item->category->category_name}}</td>
                </tr>
                <tr>
                    <th>Kondisi :</th>
                    <td>{{$item->condition->condition_name}}</td>
                </tr>
                <tr>
                    <th>Price :</th>
                    <td>{{$item->price}}</td>
                </tr>
                <tr>
                    <th>Asal Barang :</th>
                    <td>{{$item->fromWhere}}</td>
                </tr>
                <tr>
                    <th>Kerusakan :</th>
                    <td>{{$item->fault_items}}</td>
                </tr>
                <tr>
                    <th>Di Buat Tanggal :</th>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
