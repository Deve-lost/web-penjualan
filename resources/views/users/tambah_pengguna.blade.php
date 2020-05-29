@extends('layouts.master')

@section('title')
	Tambah Pengguna
@stop

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Tambah Pengguna
						</h5>
						<!-- <div class="toolbar"> -->
						<!-- </div> -->
					</div>
					<div class="card-body">
						<form action="/add-pengguna" method="POST">
							@csrf
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name">Nama Pengguna</label>
								<input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
								@if($errors->has('name'))
									<span class="help-block">
										{{ $errors->first('name') }}
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">
								@if($errors->has('username'))
									<span class="help-block">
										{{ $errors->first('username') }}
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
								@if($errors->has('password'))
									<span class="help-block">
										{{ $errors->first('password') }}
									</span>
								@endif
							</div>

							<div class="form-group">
								<label for="role">Level</label>
								<select class="form-control" name="role" id="role" value="{{ old('role') }}">
									<option value="Admin">Admin</option>
									<option value="Operator">Operator</option>
								</select>
							</div>

							<button type="submit" class="btn btn-primary">Tambah Pengguna</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop