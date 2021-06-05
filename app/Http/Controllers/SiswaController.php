<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::orderBy('id', 'DESC')->paginate(5);
        return view('siswa.index', ['siswas' => $siswas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswas,nis',
            'nama' => 'required|string',
            'kelas' => 'required|string',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('index-siswa')->with('sukses', 'Berhasil Menyimpan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa, $id)
    {
        $data = $siswa::find($id);
        return view('siswa.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|string',
            'kelas' => 'required|string'
        ]);

        $siswa::find($request->id_siswa)
            ->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'kelas' => $request->kelas
            ]);

        return redirect()->route('index-siswa')->with('sukses', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa, $id)
    {
        $siswa::find($id)
            ->delete();

        return redirect()->route('index-siswa')->with('sukses', 'Berhasil Menghapus Data');
    }
}
