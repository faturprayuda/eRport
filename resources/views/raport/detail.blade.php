@extends('layouts.app')
@section('content')
@if($msg = Session::get('sukses'))
<div class="alert alert-success alert-block container">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $msg }}</strong>
</div>
@endif
<div class="container">
    <h1 class="text-center my-5">Raport Elektronik SMP Maju Mundur</h1>
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
        </tr>
        @foreach ($data as $raport)
        <tr>
            <td>{{ $raport->Pelajaran->nama_pelajaran }}</td>
            <td>{{ $raport->Pelajaran->kkm }}</td>
            <td>{{ $raport->nilai }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
