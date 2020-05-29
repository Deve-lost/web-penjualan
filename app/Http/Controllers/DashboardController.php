<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Barang;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	// Data Chart
    	// $barang = Barang::all();
    	$kode = Penjualan::all();
            $data = [];
            $beli = [];
            foreach ($kode as $kd) {
                $data[] = $kd->tgl_transaksi;
                $beli[] = $kd->jml_beli;
            }

            // dd(json_encode($data));
        
        $barang = Barang::latest()->paginate(3);
        $bar = DB::table('tbl_barang')->count();
        $pen = DB::table('tbl_penjualan')->count();
        $use = DB::table('users')->count();

    	return view('users.dashboard', ['data' => $data, 'beli' => $beli, 'barang' => $barang, 'bar' => $bar, 'pen' => $pen, 'use' => $use]);
    }
}
