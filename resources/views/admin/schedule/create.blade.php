@extends('layouts.admin')

@section('title', 'Data Agenda Kerja')

@section('content')
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header">
            <div class="float-right mt-2 mb-2">
                <a href="{{ route("schedule.index") }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route("schedule.store") }}" method="POST">
                @csrf


                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Nama Agenda kerja</label>
                            <input type="text" name="schedule_name"
                                class="form-control @error('schedule_name') is-invalid @enderror"
                                value="{{ old('schedule_name') }}">
                            @error('schedule_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Status</label>
                            <select name="status_id" class="form-control @error('status_id') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($statuses as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_status }}</option>
                        @endforeach
                        </select>
                        @error('status_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label>User</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">--pilih--</option>
                            @foreach ($users as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="declaration" class=" form-control @error('declaration') is-invalid @enderror"
                            value="{{ old('declaration') }}" placeholder="Silahkan Di isi Jika Ada!">
                            </textarea>
                        @error('fault_items')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
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
