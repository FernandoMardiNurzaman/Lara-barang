<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode barang</th>
            <th>Nama barang</th>
            <th>Harga barang</th>
            <th>Kategori barang</th>
            <th>Asal barang</th>
            <th>Nama pelanggan</th>
            <th>Tinggi tower</th>
            <th>Bandwith</th>
            <th>Pembayaran</th>
            <th>Keterangan pelanggan</th>
            <th>Kerusakan</th>
            <th>Dibuat tanggal</th>
            <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itemExit as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->item->code }}</td>
            <td>{{ $data->item->item_name }}</td>
            <td>{{ $data->item->price }}</td>
            <td>{{ $data->item->category->category_name }}</td>
            <td>{{ $data->item->fromWhere }}</td>
            <td>{{ $data->customer->customer_name }}</td>
            <td>{{ $data->customer->height_tower }}</td>
            <td>{{ $data->customer->bandwith }}</td>
            <td>{{ $data->customer->price}}</td>
            <td>{{ $data->customer->informasion }}</td>
            <td>{{ $data->item->fault_items }}</td>
            <td>{{ $data->created_at->format('d-M-Y') }}</td>
            <td> </td>
        </tr>
        @endforeach
    </tbody>
</table>
