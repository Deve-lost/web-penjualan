@extends('layouts.master')

@section('title')
	Beranda
@stop

@section('content')
<div class="dashboard-wrapper">
	<div class="container-fluid dashboard-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Beranda
						</h5>
						<!-- <div class="toolbar"> -->
						<!-- </div> -->
					</div>
					<div class="card-body">
						<p class="navbar-brand">
							Selamat Datang Di Aplikasi Unit Produksi INFORMATIKA
						</p>
			            <div class="border-top card-footer p-0">
			                <div class="campaign-metrics d-xl-inline-block">
			                    <h4 class="mb-0">{{$bar}}</h4>
			                    <p>Total Barang</p>
			                </div>
			                <div class="campaign-metrics d-xl-inline-block">
			                    <h4 class="mb-0">{{$pen}}</h4>
			                    <p>Total Penjualan</p>
			                </div>
			                <div class="campaign-metrics d-xl-inline-block">
			                    <h4 class="mb-0">{{$use}}</h4>
			                    <p>Total Pengguna</p>
			                </div>
			                <div class="campaign-metrics d-xl-inline-block">
			                    <h4 class="mb-0">{{$pen}}</h4>
			                    <p>Laporan</p>
			                </div>
			            </div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach($barang as $bar)
			<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="product-thumbnail">
                    <div class="product-img-head">
                        <div class="product-img">
                        <div class="ribbons"></div>
                        <div class="ribbons-text">Baru</div>
                    </div>
                    <div class="product-content">
                        <div class="product-content-head">
                            <h3 class="product-title">Nama Barang : {{$bar->nm_barang}}</h3>
                            <h3 class="product-title">Kategori : {{$bar->kategori}}</h3>
                            <div class="product-price">Harga : {{ number_format($bar->harga)}}</div>
                            <div class="product-price">Jumlah Barang : {{$bar->jml_barang}}</div>
                        </div>
                        <div class="product-btn">
                            <a href="/data-barang" class="btn btn-primary">Lihat Semua</a>
                        </div>
                    	</div>
                	</div>
            	</div>
			</div>
			@endforeach
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-flex">
						<h5 class="card-header-title">
							Data Penjualan
						</h5>
						<!-- <div class="toolbar"> -->
						<!-- </div> -->
					</div>
					<div class="card-body">
						<div id="chartNila">
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@stop
@section('footer')
<!-- JavaScript -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
		Highcharts.chart('chartNila', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Laporan Penjualan'
	    },
	    xAxis: {
	        categories: {!!json_encode($data)!!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Jumlah Beli'
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Penjualan',
	        data: {!! json_encode($beli) !!}

	    }]
	});
</script>
<!-- /javascript -->
@stop