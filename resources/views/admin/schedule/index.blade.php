@extends('layouts.admin')

@section('title', ' Agenda Kerja')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

<div class="col-md-12 col-lg-12">
    <div class="card shadow">
        <div class="card-header">
            <div class="text-right mt-2 mb-2">
                <div class="text-right mt-2 mb-2">
                    <a href="{{route('export.schedule.excel')}}" class="btn btn-sm btn-info mt-1 mb-1"><i
                            class="fas fa-file-excel mr-2"></i>export excel</a>
                    <a href="{{ route("schedule.create") }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus mr-2"></i>Tambah barang
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-hover table-bordered table-sm" id="data">
                <thead>
                    <th>No</th>
                    <th>Agenda Kerja</th>
                    <th>Tanggal Mulai</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Penanggung Jawab</th>
                    <th>Tanggal Selesai</th>

                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                    <td>{{$schedule->schedule_name}}</td>
                    <td>{{$schedule->created_at->diffForHumans()}}</td>
                    <td><a href="{{ route("admin.schedule.update.status", $schedule->id) }}"
                            class="btn btn-info btn-sm">{{$schedule->status->nama_status}}</a></td>
                    <td>{{$schedule->declaration}}</td>
                    <td>{{$schedule->User->name}}</td>
                    @if ($schedule->updated_at != $schedule->created_at)
                    <td>{{$schedule->updated_at->diffForHumans()}}</td>
                    @else
                    <td></td>
                    @endif


                    <td>
                        <a href="{{ route("schedule.edit", $schedule->id) }}"
                            class="btn btn-sm btn-warning d-inline mr-1">
                            <i class="fas fa-edit mr-2"></i>edit
                        </a>
                        <form action="{{ route("schedule.destroy", $schedule->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data ini?')">
                                <i class="fas fa-trash mr-2"></i>hapus
                            </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach --}}
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
            ajax:'{!! route('get.schedule.data') !!}',
            columns:[
                {data: 'no', name: 'no'},
                {data: 'schedule_name', name:'schedule_name'},
                {data: 'tanggal_mulai', name:'tanggal_mulai'},
                {data: 'status', name:'status'},
                {data: 'declaration', name:'declaration'},
                {data: 'user_name', name:'user_name'},
                {data: 'updated', name:'updated'},
                {data: 'action', name:'action'}
            ],
        });
</script>
@endsection
