@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Kode Tindakan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.KodeTindakan.index') }}">Kode Tindakan</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Form Edit Data</h5>
                    </div>

                    <form action="{{ route('admin.KodeTindakan.update', $kode->idkode_tindakan_terapi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="form-label">Kode Tindakan</label>
                                <input type="text" name="kode" class="form-control"
                                       value="{{ $kode->kode }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Tindakan</label>
                                <textarea name="deskripsi_tindakan_terapi" class="form-control" rows="3" required>{{ $kode->deskripsi_tindakan_terapi }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="idkategori" class="form-control" required>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->idkategori }}" 
                                            {{ $k->idkategori == $kode->idkategori ? 'selected' : '' }}>
                                            {{ $k->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Klinis</label>
                                <select name="idkategori_klinis" class="form-control" required>
                                    @foreach($kategoriKlinis as $kk)
                                        <option value="{{ $kk->idkategori_klinis }}"
                                            {{ $kk->idkategori_klinis == $kode->idkategori_klinis ? 'selected' : '' }}>
                                            {{ $kk->nama_kategori_klinis }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.KodeTindakan.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection