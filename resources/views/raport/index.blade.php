@extends('layouts.app')
@section('content')
@if($msg = Session::get('sukses'))
<div class="alert alert-success alert-block container">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $msg }}</strong>
</div>
@endif
<div class="container">
    <a class="btn btn-success" href="{{ route('tambah-raport') }}">Buat Raport</a>
    <table class="table">
        <tr>
            <th>NAMA SISWA</th>
            <th>Aksi</th>
        </tr>
        @foreach ($raports as $raport)
        <tr>
            <td>{{ $raport->Siswa->nama }}</td>
            <td><a class="btn btn-info" href="{{ route('detail-raport', ['id'=>$raport->siswa_id]) }}">Detail</a> <a
                    class="btn btn-warning" href="{{ route('edit-raport', ['id'=>$raport->siswa_id]) }}">Ubah</a> <a
                    class="btn btn-danger" href="{{ route('hapus-raport', ['id' => $raport->siswa_id]) }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $raports->onEachSide(1)->links() }}
</div>
@endsection
