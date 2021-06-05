@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('simpan-siswa') }}" method="POST">
        @csrf
        <div class="container">
            <label for="nis">NIS</label>
            <input type="text" id="nis" name="nis" class="form-control @error('nis') is-invalid @enderror"
                value="{{ old('nis') }}">

            @error('nis')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama') }}">

            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" class="form-control @error('kelas') is-invalid @enderror"
                value="{{ old('kelas') }}">

            @error('kelas')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="btn btn-primary mt-3">Simpan Data</button>
        </div>
    </form>
</div>
@endsection
