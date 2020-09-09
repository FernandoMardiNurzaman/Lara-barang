<thead>
    <tr>
        <th>NO</th>
        <th>Leader</th>
        <th>Tanggal Mulai</th>
        <th>Agenda Keja</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>tanggal Selesai</th>
    </tr>
</thead>
<tbody>
    @foreach ($Schedule as $data)
    <tr>{{$loop->iteration}}</tr>
    <tr>{{$data->User->name}}</tr>
    <tr>{{$data->created_at->format('d-m-y')}}</tr>
    <tr>{{$data->schedule_name}}</tr>
    <tr>{{$data->Status->nama_status}}</tr>
    <tr>{{$data->declaration}}</tr>
    <tr>{{$data->updated_at->format('d-m-y')}}</tr>
    @endforeach
</tbody>
