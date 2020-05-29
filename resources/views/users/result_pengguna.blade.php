@extends('layouts.master')

@section('title')
	Data Pengguna
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
							Data Pengguna
						</h5>
						@if(auth()->user()->role == 'Admin')
						<div class="toolbar ml-auto">
							<a href="/add-penjualan" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
						</div>
						@endif
					</div>
					<div class="card-body">
						<form method="GET" action="/search-pengguna">
							<input type="text" placeholder="Cari Pengguna..." class="form-control col-sm-3" name="q">
						</form>
						<p></p>
						<div class="table-responsive">
							<table class="table table-bordered table-striped first">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Level</th>
										@if(auth()->user()->role == 'Admin')
										<th>Opsi</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($tampil as $r)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$r->name}}</td>
										<td>{{$r->username}}</td>
										<td>{{$r->role}}</td>
										@if(auth()->user()->role == 'Admin')
										<td>
											<a href="/pengguna/{{$r->id}}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
											<a href="#" class="btn btn-sm btn-danger delete" pengguna-id="{{$r->id}}"><i class="fas fa-user-times"></i></a>
										</td>
										@endif
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-11">
								{!! $tampil->links() !!}
							</div>
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
							Data Pengguna
						</h5>
						@if(auth()->user()->role == 'Admin')
						<div class="toolbar ml-auto">
							<a href="/add-penjualan" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
						</div>
						@endif
					</div>
					<div class="card-body">
						<form method="GET" action="/search-pengguna">
							<input type="text" placeholder="Cari Penjualan..." class="form-control col-sm-3" name="q">
						</form>
						<p></p>
						<div class="table-responsive">
							<table class="table table-bordered table-striped first">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Level</th>
										@if(auth()->user()->role == 'Admin')
										<th>Opsi</th>
										@endif
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="8"><b><i>Data Tidak Ditemukan</i></b></td>
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
			var id_pengguna = $(this).attr('pengguna-id');
			swal({
				  title: "Yakin?",
				  text: "Untuk Menghapus Pengguna Dengan ID "+id_pengguna+"",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/pengguna/"+id_pengguna+"/hapus";
				  }
				});
		});
	</script>
@stop