@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tambah Perawat</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.perawat.index') }}">Perawat</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Form Data Perawat</h3>
                    </div>

                    <form action="{{ route('admin.perawat.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            
                            {{-- Alert Info --}}
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> Pastikan User yang dipilih memiliki role <b>Perawat</b>.
                            </div>

                            <div class="row">
                                {{-- Kolom Kiri --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih User <span class="text-danger">*</span></label>
                                        <select name="iduser" class="form-control form-select" required>
                                            <option value="">-- Pilih Akun User --</option>
                                            @foreach ($users as $u)
                                                <option value="{{ $u->iduser }}">
                                                    {{ $u->nama }} ({{ $u->email }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select name="jenis_kelamin" class="form-control form-select" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Pendidikan Terakhir</label>
                                        <input type="text" name="pendidikan" class="form-control" placeholder="Contoh: D3 Keperawatan">
                                    </div>
                                </div>

                                {{-- Kolom Kanan --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor HP / WhatsApp</label>
                                        <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxx">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control" rows="4" placeholder="Masukkan alamat domisili"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.perawat.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Data
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