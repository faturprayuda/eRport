<?php

namespace App\Http\Controllers;

use App\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajarans = Pelajaran::orderBy('id', 'DESC')->paginate(5);
        return view('pelajaran.index', ['pelajarans' => $pelajarans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelajaran.tambah');
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
            'nama_pelajaran' => 'required|string',
            'kkm' => 'required|numeric|between:0,100'
        ]);

        Pelajaran::create([
            'nama_pelajaran' => $request->nama_pelajaran,
            'kkm' => $request->kkm
        ]);

        return redirect()->route('index-pelajaran')->with('sukses', 'berhasil menambah pelajaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelajaran $pelajaran, $id)
    {
        $pelajaran = $pelajaran::find($id);
        return view('pelajaran.edit', ['pelajaran' => $pelajaran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelajaran $pelajaran)
    {
        $request->validate([
            'nama_pelajaran' => 'required|string',
            'kkm' => 'required|numeric|between:0,100'
        ]);

        $pelajaran::find($request->id_pelajaran)
            ->update([
                'nama_pelajaran' => $request->nama_pelajaran,
                'kkm' => $request->kkm
            ]);

        return redirect()->route('index-pelajaran')->with('sukses', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelajaran $pelajaran, $id)
    {
        $pelajaran::find($id)
            ->delete();

        return redirect()->route('index-pelajaran')->with('sukses', 'Berhasil Menghapus Data');
    }
}
