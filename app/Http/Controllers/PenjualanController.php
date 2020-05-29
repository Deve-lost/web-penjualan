<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use DB;
use App\Barang;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = DB::table('tbl_penjualan')->orderBy('tgl_transaksi')
            ->join('tbl_barang', 'tbl_barang.kd_barang', '=' ,'tbl_penjualan.kd_barang')
            ->select('tbl_penjualan.*', 'tbl_penjualan.tgl_transaksi',
                                        'tbl_barang.kd_barang',
                                        'tbl_penjualan.nm_pelanggan',
                                        'tbl_barang.nm_barang',
                                        'tbl_barang.harga',
                                        'tbl_penjualan.jml_beli'
                )
            ->paginate(15);
            // dd($penjualan);
            
            
            
        return view('users.data_penjualan', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kd = Barang::all();

        return view('users.tambah_penjualan', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nm_pelanggan' => 'required|min:2',
            'kd_barang' => 'required',
            'jml_beli' => 'required',
            'tgl_transaksi' => 'required'
        ]);

        Penjualan::create($request->all());

        return redirect('/data-penjualan')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
       $cari = $request->get('q');
       $tampil = Penjualan::where('nm_pelanggan','LIKE','%'.$cari.'%')->orwhere('kd_barang','LIKE','%'.$cari.'%')->orwhere('jml_beli','LIKE','%'.$cari.'%')->orwhere('tgl_transaksi','LIKE','%'.$cari.'%')->paginate(15);

        return view('users.result_penjualan', compact('tampil'));
    }
}
