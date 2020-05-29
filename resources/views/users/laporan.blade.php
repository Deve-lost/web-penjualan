@extends('layouts.master')

@section('title')
	Laporan
@stop

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Laporan
						</h5>
						<div class="toolbar ml-auto">
							<a href="/export-excel" class="btn btn-sm btn-primary">Export Excel</a>
							<a href="/export-pdf" class="btn btn-sm btn-primary">Export Pdf</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped first">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Pelanggan</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Jumlah Beli</th>
										<th>Total Bayar</th>
										<th>Tanggal Transaksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($laporan as $r)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$r->nm_pelanggan}}</td>
										<td>{{$r->kd_barang}}</td>
										<td>{{$r->nm_barang}}</td>
										<td>{{number_format($r->harga)}}</td>
										<td>{{$r->jml_beli}}</td>
										<td>{{ number_format($r->harga*$r->jml_beli) }}</td>
										<td>{{$r->tgl_transaksi}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop