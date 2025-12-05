@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Rekam Medis</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dokter.rekam.index') }}">Rekam Medis</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                
                {{-- Informasi Pasien --}}
                <div class="card card-info card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-info-circle"></i> Informasi Pasien</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td style="width: 120px" class="fw-bold">Nama Hewan</td>
                                        <td>: {{ $rekam->temuDokter->pet->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Ras</td>
                                        <td>: {{ $rekam->temuDokter->pet->ras->nama_ras ?? '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td style="width: 120px" class="fw-bold">Pemilik</td>
                                        <td>: {{ $rekam->temuDokter->pet->pemilik->user->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Waktu Periksa</td>
                                        <td>: {{ $rekam->created_at ? $rekam->created_at->format('d F Y, H:i') : '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Hasil Pemeriksaan --}}
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-clipboard-pulse"></i> Hasil Pemeriksaan</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="fw-bold text-secondary">Anamnesa (Keluhan):</label>
                            <p class="border p-2 rounded bg-light">{{ $rekam->anamnesa }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="fw-bold text-secondary">Temuan Klinis:</label>
                            <p class="border p-2 rounded bg-light">{{ $rekam->temuan_klinis }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold text-secondary">Diagnosa:</label>
                            <p class="border p-2 rounded bg-light">{{ $rekam->diagnosa }}</p>
                        </div>
                    </div>
                </div>

                {{-- Tindakan / Terapi --}}
                <div class="card card-success card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title"><i class="bi bi-bandaid"></i> Tindakan & Terapi</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 200px">Kode Tindakan</th>
                                    <th>Deskripsi</th>
                                    <th>Catatan Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rekam->detailRekamMedis as $d)
                                <tr>
                                    <td><span class="badge text-bg-dark">{{ $d->tindakan->kode }}</span></td>
                                    <td>{{ $d->tindakan->deskripsi_tindakan_terapi }}</td>
                                    <td>{{ $d->detail ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Tidak ada tindakan khusus.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-4">
                    <a href="{{ route('dokter.rekam.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    {{-- Tombol Print (Opsional jika ingin dikembangkan) --}}
                    <!-- <button onclick="window.print()" class="btn btn-outline-primary float-end">
                        <i class="bi bi-printer"></i> Cetak Laporan
                    </button> -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection