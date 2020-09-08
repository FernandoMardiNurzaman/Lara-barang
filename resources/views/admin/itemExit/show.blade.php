@extends('layouts.admin')
@section('title','Detail Data Barang')

@section('content')

<div class=" col-sm-8">
    <div class="card shadow">
        <div class=" card-header">
            <div class=" mt-1 mb-1">
                <h4>Bagian Photo</h4>
                <img src="{{ asset('uploads/images/' . $itemExit->item->photo) }}" width="800" alt="img">
            </div>
        </div>
        {{-- <div class="card-body">
            <img src="{{Storage::url($itemExit->item->photo)}}" width="600">
    </div> --}}
    <div class=" card-footer">
        <a href="{{route('exit.index')}}" class="btn btn-outline-primary btn-sm "><i
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
                    <th>Kode barang :</th>
                    <td>{{$itemExit->item->code}}</td>
                </tr>
                <tr>
                    <th>Nama barang :</th>
                    <td>{{$itemExit->item->item_name}}</td>
                </tr>
                <tr>
                    <th>Harga barang :</th>
                    <td>{{$itemExit->item->price}}</td>
                </tr>
                <tr>
                    <th>Kategori barang:</th>
                    <td>{{$itemExit->item->category->category_name}}</td>
                </tr>
                <tr>
                    <th>Kondisi barang :</th>
                    <td>{{$itemExit->item->condition->condition_name}}</td>
                </tr>
                <tr>
                    <th>Asal Barang :</th>
                    <td> {{$itemExit->item->fromWhere}}</td>
                </tr>
                <tr>
                    <th>Nama Pelanggan :</th>
                    <td> {{$itemExit->customer->customer_name}}</td>
                </tr>
                <tr>
                    <th>Tinggi Tower:</th>
                    <td>{{$itemExit->customer->height_tower}}</td>
                </tr>
                <tr>
                    <th>Bandwith :</th>
                    <td>{{$itemExit->customer->bandwith}}</td>
                </tr>
                <tr>
                    <th>Pembayaran :</th>
                    <td>{{$itemExit->customer->price}}</td>
                </tr>
                <tr>
                    <th>Keterangan Pelanggan :</th>
                    <td>{{$itemExit->customer->informasion}}</td>
                </tr>
                <tr>
                    <th>Kerusakan :</th>
                    <td>{{$itemExit->customer->customer_name}}</td>
                </tr>
                <tr>
                    <th>Di Buat Tanggal :</th>
                    <td>{{$itemExit->created_at->format('d-M-Y')}}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('export.item.exit.pdf', $itemExit->id) }}" target="_blank"
                class=" btn btn-sm btn-outline-danger"><i class="fas fa-file-pdf"></i> Cetak PDF</a>
        </div>
    </div>
</div>
@endsection
