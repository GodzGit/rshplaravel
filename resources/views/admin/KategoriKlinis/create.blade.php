@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h4>Tambah Kategori Klinis</h4>
        </div>

        <div class="card-body">

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.KategoriKlinis.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_kategori_klinis" class="form-label">
                        Nama Kategori Klinis <span class="text-danger">*</span>
                    </label>

                    <input 
                        type="text" 
                        name="nama_kategori_klinis" 
                        id="nama_kategori_klinis"
                        class="form-control @error('nama_kategori_klinis') is-invalid @enderror"
                        value="{{ old('nama_kategori_klinis') }}"
                        placeholder="Masukkan nama kategori klinis" required>

                    @error('nama_kategori_klinis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.KategoriKlinis.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
