@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Daftar Rekam Medis (Dokter)</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rekam Medis</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Pemeriksaan</h3>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Pasien (Pet)</th>
                                        <th>Pemilik</th>
                                        <th>Anamnesa</th>
                                        <th>Temuan Klinis</th>
                                        <th>Waktu Periksa</th>
                                        <th style="width: 100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($rekam as $r)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td class="fw-bold">{{ $r->temuDokter->pet->nama ?? '-' }}</td>
                                        <td>{{ $r->temuDokter->pet->pemilik->user->nama ?? '-' }}</td>
                                        <td>{{ Str::limit($r->anamnesa, 40) }}</td>
                                        <td>{{ Str::limit($r->temuan_klinis, 40) }}</td>
                                        <td>
                                            <i class="bi bi-clock"></i> 
                                            {{ $r->created_at ? $r->created_at->format('d M Y H:i') : '-' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('dokter.rekam.show', $r->idrekam_medis) }}" 
                                               class="btn btn-info btn-sm text-white" title="Lihat Detail">
                                               <i class="bi bi-eye"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center p-4">Belum ada data rekam medis.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection