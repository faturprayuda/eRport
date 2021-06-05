@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('update-raport') }}" method="POST">
        @csrf
        <div class="container">
            <input type="text" name="siswa_id" id="siswa_id" value="{{ $data->siswa_id }}" hidden>
            <input type="text" name="id" id="id" value="{{ $data->id }}" hidden>
            <label for="nama_pelajaran">Nama Pelajaran</label>
            <input type="text" id="nama_pelajaran" name="nama_pelajaran"
                class="form-control @error('nama_pelajaran') is-invalid @enderror"
                value="{{ $data->Pelajaran->nama_pelajaran }}" readonly>

            @error('nama_pelajaran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="nilai">Nilai</label>
            <input type="text" id="nilai" name="nilai" class="form-control @error('nilai') is-invalid @enderror"
                value="{{ old('nilai', $data->nilai) }}">

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
