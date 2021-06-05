@extends('layouts.app')
@section('content')
@if($msg = Session::get('sukses'))
<div class="alert alert-success alert-block container">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $msg }}</strong>
</div>
@endif
<div class="container">
    <a class="btn btn-success" href="{{ route('tambah-siswa') }}">Tambah Siswa</a>
    <table class="table">
        <tr>
            <th>NIS</th>
            <th>NAMA</th>
            <th>KELAS</th>
            <th>Aksi</th>
        </tr>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td class="text-uppercase">{{ $siswa->kelas }}</td>
            <td><a class="btn btn-warning" href="{{ route('edit-siswa', ['id'=>$siswa->id]) }}">Detail</a> <a
                    class="btn btn-danger" href="{{ route('hapus-siswa', ['id' => $siswa->id]) }}">Hapus</a></td>
        </tr>
        @endforeach
    </table>
    {{ $siswas->onEachSide(1)->links() }}
</div>
@endsection
