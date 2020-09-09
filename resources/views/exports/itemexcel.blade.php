<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode barang</th>
            <th>Nama barang</th>
            <th>Harga barang</th>
            <th>Kategori barang</th>
            <th>Kondisi barang</th>
            <th>Asal barang</th>
            <th>Kerusakan</th>
            <th>Tanggal Di Input</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->code}}</td>
            <td>{{$data->item_name}}</td>
            <td>{{$data->price}}</td>
            <td>{{$data->category->category_name}}</td>
            <td>{{$data->condition->condition_name}}</td>
            <td>{{$data->fromWhere}}</td>
            <td>{{$data->fault_items}}</td>
            <td>{{$data->created_at->format('d-m-y')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
