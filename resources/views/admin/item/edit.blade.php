@extends('layouts.admin')

@section('title', 'Data Barang')

@section('content')
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header">
            <div class="float-right mt-2 mb-2">
                <a href="{{ route("item.index") }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route("item.update", $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Nama barang</label>
                            <input type="text" name="item_name"
                                class="form-control @error('item_name') is-invalid @enderror"
                                value="{{ $item->item_name }}">
                            @error('item_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kode barang</label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                value="{{ $item->code }}">
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Kondisi</label>
                            <select name="condition_id"
                                class="form-control @error('condition_id') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($conditions as $data)
                                <option value="{{ $data->id }}"
                                    {{ ($data->id == $item->condition_id) ? 'selected' : '' }}>
                                    {{ $data->condition_name }}</option>
                                @endforeach
                            </select>
                            @error('condition_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($categories as $data)
                                <option value="{{ $data->id }}"
                                    {{ ($data->id == $item->category_id) ? 'selected' : '' }}>{{ $data->category_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{ $item->price}}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Asal barang</label>
                    <textarea name="fromWhere"
                        class="form-control @error('fromWhere') is-invalid @enderror">{{ $item->fromWhere}}</textarea>
                    {{-- <input type="text" name="fromWhere" class="form-control @error('fromWhere') is-invalid @enderror"
                        value="{{ old('fromWhere') }}"> --}}
                    @error('fromWhere')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kerusakan</label>
                    <textarea name="fault_items" class=" form-control @error('fault_items') is-invalid @enderror"
                        placeholder="Silahkan Di isi Jika Ada!">{{ $item->fault_items }} </textarea>
                    {{-- <input type="text" name="fault_items"
                        class="form-control @error('fault_items') is-invalid @enderror" value="{{ old('fault_items') }}"
                    placeholder="Silahkan Di isi Jika Ada!"> --}}
                    @error('fault_items')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="photo" class="form-control">
                    <br>
                    <a href="{{asset('uploads/images/' . $item->photo)}}" target="_blank">
                        <img src="{{asset('uploads/images/' . $item->photo)}}" width="200">
                    </a>
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>

                    <button type="reset" class="btn btn-warning btn-sm">
                        <i class="fas fa-undo mr-2"></i>Reset
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection
