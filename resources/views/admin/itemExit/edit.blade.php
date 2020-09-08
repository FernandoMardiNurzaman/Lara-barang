@extends('layouts.admin')

@section('title','Data Perangkat Terpasang')
@section('content')



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<div class=" col-sm-12 col-lg-12">
    <div class="card shadow">
        <div class=" card-header">
            {{-- <h5>Form Pengisian Data Barang Terpasang</h5> --}}
            <div class="text-right">
                <a href="{{route('exit.index')}}" class=" btn btn-outline-primary"><i class="fas fa-arrow-left"></i>
                    Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('exit.update',$exit->id)}}" method="POST">
                        @method('put')
                        @csrf
                        <div class=" form-group">
                            <label for="">Nama Pelanggan :</label>
                            <select name="customer_id" id="select1"
                                class=" form-control customer @error('customer_id') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($customer as $data)
                                <option value="{{$data->id}}" {{ ($data->id == $exit->customer_id) ? 'selected' : '' }}>
                                    {{ $data->customer_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            {{$message}}
                            @enderror
                        </div>

                        <div class=" form-group">
                            <label for="">Nama barang :</label>
                            <select name="item_id" id="select2"
                                class=" form-control item  @error('item_id') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($items as $data)
                                <option value="{{$data->id}}" {{ ($data->id == $exit->item_id) ? 'selected' : '' }}>
                                    {{ $data->item_name }}-({{ $data->condition->condition_name }})
                                </option>
                                @endforeach
                            </select>
                            @error('item_id')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>IP address Pelanggan:</label>
                            <input type="text" name="ip_adrress"
                                class="form-control @error('ip_adress') is-invalid @enderror"
                                value="{{ old('ip_adrress', $exit->ip_adrress) }}">
                            @error('ip_adrres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>BackBound:</label>
                            <input type="text" name="backbond"
                                class="form-control @error('backbond') is-invalid @enderror"
                                value="{{ old('backbond', $exit->backbond) }}">
                            @error('backbond')
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
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.customer').select2();
        $('.item').select2();
    });
</script>
@endsection
