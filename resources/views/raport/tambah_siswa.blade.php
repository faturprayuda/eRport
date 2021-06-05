@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('simpan-raport-siswa') }}" method="POST">
        @csrf
        <div class="container">
            <label for="nama_siswa">Nama Siswa</label>
            <select name="nama_siswa" id="nama_siswa" class="form-control @error('nama_siswa')
                is-invalid
            @enderror">
                @foreach ($siswas as $siswa)
                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>

            @error('nama_siswa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="nama_pelajaran">Nama Pelajaran</label>
            <select name="nama_pelajaran" id="nama_pelajaran" class="form-control">
                @foreach ($pelajarans as $pelajaran)
                <option value="{{ $pelajaran->id }}">{{ $pelajaran->nama_pelajaran }}</option>
                @endforeach
            </select>

            <label for="nilai">Nilai</label>
            <input type="text" id="nilai" name="nilai" class="form-control @error('nilai') is-invalid @enderror"
                value="{{ old('nilai') }}">

            @error('nilai')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="btn btn-primary mt-3">Simpan Data</button>
        </div>
    </form>
</div>
@endsection
