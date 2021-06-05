@extends('layouts.app')
@section('content')
@if($msg = Session::get('sukses'))
<div class="alert alert-success alert-block container">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $msg }}</strong>
</div>
@endif
<div class="container">
    <a class="btn btn-success" href="{{ route('tambah-pelajaran') }}">Tambah Pelajaran</a>
    <table class="table">
        <tr>
            <th>NAMA PELAJARAN</th>
            <th>KKM</th>
            <th>Aksi</th>
        </tr>
        @foreach ($pelajarans as $pelajaran)
        <tr>
            <td>{{ $pelajaran->nama_pelajaran }}</td>
            <td class="text-uppercase">{{ $pelajaran->kkm }}</td>
            <td><a class="btn btn-warning" href="{{ route('edit-pelajaran', ['id'=>$pelajaran->id]) }}">Detail</a> <a
                    class="btn btn-danger" href="{{ route('hapus-pelajaran', ['id' => $pelajaran->id]) }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $pelajarans->onEachSide(1)->links() }}
</div>
@endsection
