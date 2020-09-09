<thead>
    <tr>
        <th>NO</th>
        <th>Tanggal Mulai</th>
        <th>Agenda Keja</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Leader</th>
        <th>tanggal Selesai</th>
    </tr>
</thead>
<tbody>
    @foreach ($Schedule as $data)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$data->created_at->format('d-m-y')}}</td>
        <td>{{$data->schedule_name}}</td>
        <td>{{$data->status->nama_status}}</td>
        <td>{{$data->declaration}}</td>
        <td>{{$data->user->name}}</td>
        <td>{{$data->updated_at->format('d-m-y')}}</td>
    </tr>
    @endforeach
</tbody>
