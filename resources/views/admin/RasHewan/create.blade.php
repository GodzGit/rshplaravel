<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jenis Hewan</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Ras Hewan</h4>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.RasHewan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Ras Hewan</label>
            <input type="text" name="nama_ras" class="form-control @error('nama_ras') is-invalid @enderror"
                value="{{ old('nama_ras') }}" required>

            @error('nama_ras')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Jenis Hewan</label>
            <select name="idjenis_hewan" class="form-control @error('idjenis_hewan') is-invalid @enderror" required>
                <option value="">-- Pilih Jenis Hewan --</option>
                @foreach ($jenis as $j)
                    <option value="{{ $j->idjenis_hewan }}">{{ $j->nama_jenis_hewan }}</option>
                @endforeach
            </select>

            @error('idjenis_hewan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.RasHewan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

</body>
</html>