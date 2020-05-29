<div class="dashboard-header">
	<nav class="navbar navbar-expand-lg bg-white fixed-top">
		<img src="{{ asset('frontend/images/logo.png') }}" style="width: 45px; height: 45px; margin-left: 20px;">
		<a class="navbar-brand" href="/dashboard">Unit Produksi</a>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto navbar-right-top">
				<li class="nav-item">
					<a class="nav-link">{{auth()->user()->name}}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link">{{auth()->user()->role}}</a>
				</li>
			</ul>
		</div>
	</nav>
</div>