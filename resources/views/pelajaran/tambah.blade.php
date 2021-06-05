@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('simpan-pelajaran') }}" method="POST">
        @csrf
        <div class="container">
            <label for="nama_pelajaran">Nama Pelajaran</label>
            <input type="text" id="nama_pelajaran" name="nama_pelajaran"
                class="form-control @error('nama_pelajaran') is-invalid @enderror" value="{{ old('nama_pelajaran') }}">

            @error('nama_pelajaran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="kkm">KKM</label>
            <input type="text" id="kkm" name="kkm" class="form-control @error('kkm') is-invalid @enderror"
                value="{{ old('kkm') }}">

            @error('kkm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="btn btn-primary mt-3">Simpan Data</button>
        </div>
    </form>
</div>
@endsection
