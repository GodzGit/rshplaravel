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
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h4>Tambah Jenis Hewan</h4>
                </div>

                <div class="card-body">

                    {{-- Error Alert --}}
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('admin.JenisHewan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_jenis_hewan" class="form-label">
                                Nama Jenis Hewan <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                id="nama_jenis_hewan"
                                name="nama_jenis_hewan"
                                class="form-control @error('nama_jenis_hewan') is-invalid @enderror"
                                value="{{ old('nama_jenis_hewan') }}"
                                placeholder="Masukkan nama jenis hewan"
                                required
                            >

                            @error('nama_jenis_hewan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.JenisHewan.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
</body>
</html>