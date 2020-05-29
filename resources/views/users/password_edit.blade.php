@extends('layouts.master')

@section('title')
	Edit Password
@stop

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Edit Password
						</h5>
					</div>
					<div class="card-body">
						<form action="/password/{{$data->id}}/update" method="POST">
							@csrf
								<input type="hidden" name="name" class="form-control" id="name" value="{{ $data->name }}">

								<input type="hidden" name="username" class="form-control" id="username" value="{{ $data->username }}">

							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="password">Masukkan Password Baru</label>
								<input type="password" name="password" class="form-control" id="name">
								@if($errors->has('password'))
									<span class="help-block">
										{{ $errors->first('password') }}
									</span>
								@endif
							</div>

							<button type="submit" class="btn btn-warning">Edit Password</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop