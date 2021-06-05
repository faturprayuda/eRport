<?php

namespace App\Http\Controllers;

use App\Pelajaran;
use App\Raport;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Raport::select('siswa_id')->groupBy('siswa_id')->paginate(5);
        return view('raport.index', ['raports' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas = Siswa::all();
        $pelajarans = Pelajaran::all();
        return view('raport.tambah_siswa', [
            'siswas' => $siswas,
            'pelajarans' => $pelajarans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Raport::create([
            'siswa_id' => $request->nama_siswa,
            'pelajaran_id' => $request->nama_pelajaran,
            'nilai' => $request->nilai
        ]);

        return redirect()->route('index-raport')->with('sukses', 'berhasil menambah data');

        // Session::put('siswa_id', $request->nama_siswa);
        // $pelajarans = Pelajaran::all();
        // $siswa = Siswa::find(Session::get('siswa_id'));
        // return view('raport.tambah_pelajaran', [
        //     'pelajarans' => $pelajarans,
        //     'siswa' => $siswa
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Raport::where('siswa_id', $id)->get();
        return view('raport.detail', ['data' => $data]);
    }

    public function showEdit($id)
    {
        $data = Raport::find($id);
        return view('raport.ubah', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Raport::where('siswa_id', $id)->get();
        return view('raport.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Raport::find($request->id)
            ->update([
                'nilai' => $request->nilai
            ]);
        return redirect()->route('edit-raport', ['id' => $request->siswa_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raport $raport, $id)
    {
        $raport::where('siswa_id', $id)->delete();
        return redirect()->back();
    }
}
