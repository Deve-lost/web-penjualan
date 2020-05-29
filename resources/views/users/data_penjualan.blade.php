@extends('layouts.master')

@section('title')
	Data Penjualan
@stop

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Data Penjualan
						</h5>
						<div class="toolbar ml-auto">
							<a href="/add-penjualan" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
						</div>
					</div>
					<div class="card-body">
						<form method="GET" action="/search-penjualan">
							<input type="text" placeholder="Cari Penjualan..." class="form-control col-sm-3" name="q">
						</form>
						<p></p>
						<div class="table-responsive">
							<table class="table table-bordered table-striped first">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Transaksi</th>
										<th>Nama Pelanggan</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Jumlah Beli</th>
										<th>Total Bayar</th>
									</tr>
								</thead>
								<tbody>
									@foreach($penjualan as $r)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$r->tgl_transaksi}}</td>
										<td>{{$r->nm_pelanggan}}</td>
										<td>{{$r->kd_barang}}</td>
										<td>{{$r->nm_barang}}</td>
										<td>{{number_format($r->harga)}}</td>
										<td>{{$r->jml_beli}}</td>
										<td>{{number_format($r->harga*$r->jml_beli) }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-11">
								{!! $penjualan->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop