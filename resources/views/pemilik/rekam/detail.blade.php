@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Detail Rekam Medis</h3></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('pemilik.rekam.index') }}">Rekam Medis</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- Info Utama --}}
                <div class="card card-outline card-primary mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Pemeriksaan</h3>
                        <div class="card-tools">
                            <span class="badge text-bg-secondary">
                                {{ $rekam->created_at ? \Carbon\Carbon::parse($rekam->created_at)->format('d F Y') : '-' }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Anamnesa (Keluhan)</strong>
                                <p class="text-muted border p-2 rounded bg-light">{{ $rekam->anamnesa }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Temuan Klinis</strong>
                                <p class="text-muted border p-2 rounded bg-light">{{ $rekam->temuan_klinis }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Diagnosa</strong>
                                <p class="text-muted border p-2 rounded bg-light">{{ $rekam->diagnosa }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tabel Tindakan --}}
                <div class="card card-outline card-success mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Tindakan & Terapi</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Kode</th>
                                    <th style="width: 35%">Tindakan</th>
                                    <th>Catatan Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail as $d)
                                <tr>
                                    <td><span class="badge text-bg-dark">{{ $d->kode }}</span></td>
                                    <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                                    <td>{{ $d->detail }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <a href="{{ route('pemilik.rekam.index') }}" class="btn btn-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection