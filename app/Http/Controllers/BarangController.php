<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('kd_barang','ASC')->paginate(15);
        return view('users.data_barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.tambah_barang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_barang' => 'required|min:5|max:5|unique:tbl_barang',
            'nm_barang' => 'required',
            'kategori' => 'required',
            'jml_barang' => 'required',
            'harga' => 'required'
        ]);

        Barang::create($request->all());

        return redirect('/data-barang')->with('sukses','Data Berhasil Ditambahkan');
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
    public function edit(Request $request, $id)
    {
        $data = DB::table('tbl_barang')->where('kd_barang', $id)->get();
        return view('users.edit_barang', ['data' => $data]);
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
       $this->validate($request, [
            // 'kd_barang' => 'required|min:5|max:5|unique:tbl_barang',
            'nm_barang' => 'required',
            'kategori' => 'required',
            'jml_barang' => 'required',
            'harga' => 'required'
        ]);

         $barang = [
            // 'kd_barang' => $request->kd,
            'nm_barang' => $request->nm_barang,
            'kategori' => $request->kategori,
            'jml_barang' => $request->jml_barang,
            'harga' => $request->harga
        ];

        $update = Barang::where('kd_barang', $id)->update($barang);

        return redirect('/data-barang')->with('sukses','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::where('kd_barang', $id)->delete();

        return redirect('/data-barang')->with('sukses','Data Berhasil Dihapus!');
    }

    public function search(Request $request)
    {
        $cari = $request->get('q');
        $tampil = Barang::where('nm_barang','LIKE','%'.$cari.'%')->orwhere('kd_barang','LIKE','%'.$cari.'%')->orwhere('kategori','LIKE','%'.$cari.'%')->orwhere('jml_barang','LIKE','%'.$cari.'%')->orwhere('harga','LIKE','%'.$cari.'%')->paginate(15);
        return view('users.result_barang', compact('tampil'));
    }
}
