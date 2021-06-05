@extends('layouts.app')
@section('content')
@if($msg = Session::get('sukses'))
<div class="alert alert-success alert-block container">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $msg }}</strong>
</div>
@endif
<div class="container">
    <a class="btn btn-primary" href="{{ route('tambah-raport') }}">Tambah Data Raport</a>
    <table class="table">
        <tr>
            <th>Nama</th>
            <th>:</th>
            <th>{{ $data[0]->Siswa->nama }}</th>
        </tr>
        <tr>
            <th>Kelas</th>
            <th>:</th>
            <th>{{ $data[0]->Siswa->kelas }}</th>
        </tr>
        <tr>
            <th>NAMA PELAJARAN</th>
            <th>KKM</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $raport)
        <tr>
            <td>{{ $raport->Pelajaran->nama_pelajaran }}</td>
            <td>{{ $raport->Pelajaran->kkm }}</td>
            <td>{{ $raport->nilai }}</td>
            <td><a href="{{ route('ubah-raport', [$raport->id]) }}" class="btn btn-warning">Ubah</a> <a href=""
                    class="btn btn-danger">Hapus</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
