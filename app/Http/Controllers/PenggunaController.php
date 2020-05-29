<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('users.data_pengguna', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.tambah_pengguna');
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
            'role' => 'required',
            'name' => 'required|min:2',
            'username' => 'required|unique:users',
            'password' => 'required|min:2',
        ]);

        User::create([
                            'role' => $request->role,
                            'name' => $request->name,
                            'username' => $request->username,
                            'password' => bcrypt($request->password)
                        ]);

        return redirect('/data-pengguna')->with('sukses','Data Berhasil Ditambahkan');
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
        $data = User::find($id);
        // dd($data);
        return view('users.edit_pengguna', ['data' => $data]);
    }

    public function editpassword($id)
    {
        $data = User::find($id);
        return view('users.password_edit', ['data' => $data]);
    }

    public function updatepassword(Request $request,$id)
    {
        $this->validate($request, [
            'password' => 'required|min:2',
        ]);

        $pengguna = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];

        $update = User::where('id', $id)->update($pengguna);

        return redirect('/data-pengguna')->with('sukses','Password Berhasil Diubah');
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
            'name' => 'required|min:2',
            'username' => 'required',
        ]);

        $users = User::find($id);
        $users->update($request->all());
        return redirect('/data-pengguna')->with('sukses','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect('/data-pengguna')->with('sukses','Data Berhasil Dihapus!');
    }

    public function search(Request $request)
    {
        $cari = $request->get('q');
        $tampil = User::where('name','LIKE','%'.$cari.'%')->orwhere('username','LIKE','%'.$cari.'%')->orwhere('role','LIKE','%'.$cari.'%')->paginate(15);

        return view('users.result_pengguna', compact('tampil'));
    }
}
