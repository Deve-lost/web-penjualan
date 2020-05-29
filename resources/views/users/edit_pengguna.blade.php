@extends('layouts.master')

@section('title')
	Edit Pengguna
@stop

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Edit Pengguna
						</h5>
						<div class="toolbar ml-auto">
							<a href="/edit/{{$data->id}}/password" class="btn btn-sm btn-primary">Edit Password</a>
						</div>
					</div>
					<div class="card-body">
						<form action="/pengguna/{{$data->id}}/edit" method="POST">
							@csrf
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name">Nama Pengguna</label>
								<input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}">
								@if($errors->has('name'))
									<span class="help-block">
										{{ $errors->first('name') }}
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
								<label for="username">Username</label>
								<input type="username" name="username" class="form-control" id="username" value="{{ $data->username }}">
								@if($errors->has('username'))
									<span class="help-block">
										{{ $errors->first('username') }}
									</span>
								@endif
							</div>

							<div class="form-group">
								<label for="role">Level</label>
								<select class="form-control" name="role" id="role">
									<option value="Admin" {{ $data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
									<option value="Operator" {{ $data->role == 'Operator' ? 'selected' : '' }}>Operator</option>
								</select>
							</div>

							<button type="submit" class="btn btn-warning">Edit Pengguna</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop