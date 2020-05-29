@extends('layouts.master')

@section('title')
	Tambah Barang
@stop

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Tambah Barang
						</h5>
						<!-- <div class="toolbar"> -->
						<!-- </div> -->
					</div>
					<div class="card-body">
						<form action="/add-barang" method="POST">
							@csrf
							<div class="form-group {{ $errors->has('kd_barang') ? 'has-errors' : '' }}">
								<label for="kd_barang">Kode Barang</label>
								<input type="text" name="kd_barang" class="form-control" id="kd_barang" value="{{ old('kd_barang') }}">
								@if($errors->has('kd_barang'))
									<span class="help-block">
										<p>{{$errors->first('kd_barang')}}</p>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('nm_barang') ? 'has-errors' : '' }}">
								<label for="nm_barang">Nama Barang</label>
								<input type="text" name="nm_barang" class="form-control" id="nm_barang" value="{{ old('nm_barang') }}">
								@if($errors->has('nm_barang'))
									<span class="help-block">
										<p>{{$errors->first('nm_barang')}}</p>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('kategori') ? 'has-errors' : '' }}">
								<label for="kategori">Kategori</label>
								<input type="text" name="kategori" class="form-control" id="kategori" value="{{ old('kategori') }}">
								@if($errors->has('kategori'))
									<span class="help-block">
										<p>{{$errors->first('kategori')}}</p>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('jml_barang') ? 'has-errors' : '' }}">
								<label for="jml_barang">Jumlah Barang</label>
								<input type="number" name="jml_barang" class="form-control" id="jml_barang" value="{{ old('jml_barang') }}">
								@if($errors->has('jml_barang'))
									<span class="help-block">
										<p>{{$errors->first('jml_barang')}}</p>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('harga') ? 'has-errors' : '' }}">
								<label for="harga">Harga Barang</label>
								<input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga') }}">
								@if($errors->has('harga'))
									<span class="help-block">
										<p>{{$errors->first('harga')}}</p>
									</span>
								@endif
							</div>

							<button type="submit" class="btn btn-primary">Tambah Barang</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop