@extends('layouts.master')

@section('title')
	Tambah Penjual
@stop


@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Tambah Penjualan
						</h5>
						<!-- <div class="toolbar"> -->
						<!-- </div> -->
					</div>
					<div class="card-body">
						<form action="/add-penjualan" method="POST">
							@csrf
							<div class="form-group {{ $errors->has('nm_pelanggan') ? 'has-errors' : '' }}">
								<label for="nm_pelanggan">Nama Pelanggan</label>
								<input type="text" name="nm_pelanggan" class="form-control" id="nm_pelanggan" value="{{ old('nm_pelanggan') }}">
								@if($errors->has('nm_pelanggan'))
									<span class="help-block">
										<p>{{$errors->first('nm_pelanggan')}}</p>
									</span>
								@endif
							</div>

							<div class="form-group">
								<label for="kd_barang">Nama Barang</label>
								<select name="kd_barang" id="kd_barang" class="form-control">
									@foreach($kd as $r)
										<option value="{{$r->kd_barang}}">{{$r->nm_barang}}</option>
									@endforeach
								</select>
							</div>
<!-- 
							<div class="form-group">
								<label for="harga">Harga</label>
								<input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga') }}">
							</div> -->

							<div class="form-group {{ $errors->has('jml_beli') ? 'has-errors' : '' }}">
								<label for="jml_beli">Jumlah Beli</label>
								<input type="number" name="jml_beli" class="form-control" id="jml_beli" value="{{ old('jml_beli') }}">
								@if($errors->has('jml_beli'))
									<span class="help-block">
										<p>{{$errors->first('jml_beli')}}</p>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('tgl_transaksi') ? 'has-errors' : '' }}">
								<label for="tgl_transaksi">Tanggal Transaksi</label>
								<input type="date" name="tgl_transaksi" class="form-control" id="tgl_transaksi" value="{{ old('tgl_transaksi') }}">
								@if($errors->has('tgl_transaksi'))
									<span class="help-block">
										<p>{{$errors->first('tgl_transaksi')}}</p>
									</span>
								@endif
							</div>

							<button type="submit" class="btn btn-primary">Tambah Transaksi</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
