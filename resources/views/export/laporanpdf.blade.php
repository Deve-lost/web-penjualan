<table width="500" border="1">
	<thead>
		<tr align="center">
			<th>Nama Pelanggan</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Jumlah Beli</th>
			<th>Tanggal Transaksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($laporan as $r)
		<tr align="center">
			<td>{{$r->nm_pelanggan}}</td>
			<td>{{$r->kd_barang}}</td>
			<td>{{$r->nm_barang}}</td>
			<td>{{$r->harga}}</td>
			<td>{{$r->jml_beli}}</td>
			<td>{{$r->tgl_transaksi}}</td>
		</tr>
		@endforeach
	</tbody>
</table>