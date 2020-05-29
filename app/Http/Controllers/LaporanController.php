<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Barang;
use DB;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
    	$laporan = DB::table('tbl_penjualan')
            ->join('tbl_barang', 'tbl_barang.kd_barang', '=' ,'tbl_penjualan.kd_barang')
            ->select('tbl_penjualan.*', 'tbl_penjualan.tgl_transaksi',
                                        'tbl_barang.kd_barang',
                                        'tbl_penjualan.nm_pelanggan',
                                        'tbl_barang.nm_barang',
                                        'tbl_barang.harga',
                                        'tbl_penjualan.jml_beli'
                )
            ->latest()->paginate(15);

    	// $laporan = Penjualan::orderBy('tgl_transaksi', 'ASC')->paginate(1);
    	return view('users.laporan', compact('laporan'));
    }

    public function exportExcel() 
    {
        return Excel::download(new LaporanExport, 'data-laporan.xlsx');
    }

    public function exportPdf()
    {
        $laporan = Penjualan::all();
        $pdf = PDF::loadView('export.laporanpdf', ['laporan' => $laporan]);
        return $pdf->download('data-laporan.pdf');
    }

}
