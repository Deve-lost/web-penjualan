@extends('layouts.master')

@section('title')
	Data Barang
@stop

@section('content')
@if(count($tampil))
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Data Barang
						</h5>
						<div class="toolbar ml-auto">
							<a href="/add-barang" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
						</div>
					</div>
					<div class="card-body">
						<form method="GET" action="/search-barang">
							<input type="text" placeholder="Cari Barang..." class="form-control col-sm-3" name="q">
						</form>
						<p></p>
						<div class="table-responsive">
							<table class="table table-bordered table-striped first">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Kategori</th>
										<th>Jumlah Barang</th>
										<th>Harga Barang</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tampil as $r)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$r->kd_barang}}</td>
										<td>{{$r->nm_barang}}</td>
										<td>{{$r->kategori}}</td>
										<td>{{$r->jml_barang}}</td>
										<td>{{$r->harga}}</td>
										<td>
											<a href="/barang/{{$r->kd_barang}}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
											<a href="#" class="btn btn-sm btn-danger delete" barang-id="{{$r->kd_barang}}"><i class="fas fa-trash-alt"></i></a>
										</td>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@else
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Data Barang
						</h5>
						<div class="toolbar ml-auto">
							<a href="/add-barang" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
						</div>
					</div>
					<div class="card-body">
						<form method="GET" action="/search-barang">
							<input type="text" placeholder="Cari Barang..." class="form-control col-sm-3" name="q">
						</form>
						<p></p>
						<div class="table-responsive">
							<table class="table table-bordered table-striped first">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Kategori</th>
										<th>Jumlah Barang</th>
										<th>Harga Barang</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="7"><b><i>Data Tidak Ditemukan</i></b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@stop

@section('footer')
	<script type="text/javascript">
		$('.delete').click(function(){
			var barang_id = $(this).attr('barang-id');
			swal({
				  title: "Yakin?",
				  text: "Untuk Menghapus Barang Dengan Kode "+barang_id+"",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/barang/"+barang_id+"/hapus";
				  }
				});
		});
	</script>
@stop