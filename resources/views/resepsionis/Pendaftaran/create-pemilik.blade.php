@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Registrasi Pemilik Baru</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.Pendaftaran.index') }}">Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Pemilik Baru</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10"> <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Form Data Pemilik & Akun</h3>
                    </div>

                    <form action="{{ route('resepsionis.Pendaftaran.storePemilik') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                {{-- Kolom Kiri: Data Akun --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 border-bottom pb-2">Data Akun</h5>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" name="nama" class="form-control" required placeholder="Nama Pemilik">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="email" name="email" class="form-control" required placeholder="email@contoh.com">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-key"></i></span>
                                            <input type="password" name="password" class="form-control" required placeholder="Password login">
                                        </div>
                                    </div>
                                </div>

                                {{-- Kolom Kanan: Data Kontak --}}
                                <div class="col-md-6">
                                    <h5 class="mb-3 border-bottom pb-2">Data Kontak</h5>

                                    <div class="mb-3">
                                        <label class="form-label">No. WhatsApp <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                            <input type="text" name="no_wa" class="form-control" required placeholder="08xxxxxxxx">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                        <textarea name="alamat" class="form-control" rows="4" required placeholder="Masukkan alamat domisili"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('resepsionis.Pendaftaran.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Data Pemilik
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