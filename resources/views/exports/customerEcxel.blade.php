<thead>
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Almat</th>
        <th>Bandwith</th>
        <th>Tagihan</th>
        <th>Tinggi Tower</th>
        <th>Keterangan</th>
        <th>tanggal Di buat</th>
    </tr>
</thead>
<tbody>
    @foreach ($customers as $data)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$data->customer_name}}</td>
        <td>{{$data->address}}</td>
        <td>{{$data->bandwith}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->height_tower}}</td>
        <td>{{$data->infromasion}}</td>
        <td>{{$data->created_at}}</td>
    </tr>
    @endforeach
</tbody>
