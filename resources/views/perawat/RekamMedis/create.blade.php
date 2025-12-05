@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Input Rekam Medis</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perawat.RekamMedis.index') }}">Rekam Medis</a></li>
                    <li class="breadcrumb-item active">Input</li>
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
                        <h3 class="card-title">Form Pemeriksaan</h3>
                    </div>

                    <form action="{{ route('perawat.RekamMedis.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            
                            {{-- Baris 1: Pilih Pasien --}}
                            <div class="mb-4">
                                <label class="form-label">Pasien (Dari Antrian Temu Dokter) <span class="text-danger">*</span></label>
                                <select name="idreservasi_dokter" class="form-control form-select" required>
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach ($temu as $t)
                                        <option value="{{ $t->idreservasi_dokter }}">
                                            {{ $t->pet->nama }} ({{ $t->pet->ras->nama_ras ?? 'Ras tidak diketahui' }}) 
                                            - Daftar: {{ $t->waktu_daftar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>

                            <div class="row">
                                {{-- Kolom Kiri: Analisa Medis --}}
                                <div class="col-md-6 border-end">
                                    <h5 class="text-primary mb-3">Analisa Medis</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Anamnesa <span class="text-danger">*</span></label>
                                        <textarea name="anamnesa" class="form-control" rows="3" required placeholder="Keluhan dan riwayat..."></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Temuan Klinis <span class="text-danger">*</span></label>
                                        <textarea name="temuan_klinis" class="form-control" rows="3" required placeholder="Hasil pemeriksaan fisik..."></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Diagnosa</label>
                                        <textarea name="diagnosa" class="form-control" rows="2" placeholder="Kesimpulan diagnosa..."></textarea>
                                    </div>
                                </div>

                                {{-- Kolom Kanan: Tindakan --}}
                                <div class="col-md-6">
                                    <h5 class="text-success mb-3">Tindakan / Terapi</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Jenis Tindakan <span class="text-danger">*</span></label>
                                        <select name="idkode_tindakan_terapi" class="form-control form-select" required>
                                            <option value="">-- Pilih Tindakan --</option>
                                            @foreach ($tindakan as $t)
                                                <option value="{{ $t->idkode_tindakan_terapi }}">
                                                    {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Detail Tindakan / Catatan Tambahan</label>
                                        <textarea name="detail" class="form-control" rows="5" placeholder="Jelaskan detail tindakan yang dilakukan..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('perawat.RekamMedis.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Rekam Medis
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