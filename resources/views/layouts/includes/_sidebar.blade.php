<div class="nav-left-sidebar sidebar-dark">
	<div class="menu-list">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav flex-column">
					<li class="nav-divider">
						Menu
					</li>
					<li class="nav-item">
						<a href="/dashboard" class="nav-link active"><i class="fas fa-user-circle"></i>Beranda</a>
					</li>
					<li class="nav-item">
						<a href="/data-barang" class="nav-link"><i class="fas fa-hdd"></i>Data Barang</a>
					</li>
					<li class="nav-item">
						<a href="/data-penjualan" class="nav-link">
							<i class="fas fa-calculator"></i>
							Data Penjualan
						</a>
					</li>
					<li class="nav-item">
						<a href="/data-pengguna" class="nav-link"><i class="fas fa-users"></i>Data Pengguna</a>
					</li>
					@if(auth()->user()->role == 'Admin')
					<li class="nav-item">
						<a href="/laporan" class="nav-link"><i class="fas fa-book"></i>Laporan</a>
					</li>
					@endif
					<li class="nav-item">
						<a href="#" class="nav-link keluar"><i class="fas fa-sign-out-alt"></i>Logout</a>
					</li>
				</ul>
			</div>
		</nav>	
	</div>
</div>