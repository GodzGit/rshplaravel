@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Rekam Medis (Perawat)</h3>
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
                
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card card-outline card-primary mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Rekam Medis</h3>
                        <div class="card-tools">
                            <a href="{{ route('perawat.RekamMedis.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg"></i> Tambah Rekam Medis
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Pet / Pasien</th>
                                        <th style="width: 20%">Anamnesa & Temuan</th>
                                        <th style="width: 15%">Diagnosa</th>
                                        <th style="width: 20%">Tindakan</th>
                                        <th style="width: 25%">Detail Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rekam as $r)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td class="fw-bold">
                                            {{ $r->temuDokter->pet->nama ?? '-' }}
                                            <br>
                                            <small class="text-muted">
                                                {{ $r->temuDokter->pet->ras->nama_ras ?? '' }}
                                            </small>
                                        </td>
                                        <td>
                                            <strong>Anamnesa:</strong><br>
                                            {{ $r->anamnesa }}
                                            <hr class="my-1">
                                            <strong>Temuan:</strong><br>
                                            {{ $r->temuan_klinis }}
                                        </td>
                                        <td>{{ $r->diagnosa }}</td>
                                        <td>
                                            @if($r->detailRekamMedis->count() > 0)
                                                <ul class="ps-3 mb-0">
                                                    @foreach ($r->detailRekamMedis as $d)
                                                        <li>{{ $d->tindakan->deskripsi_tindakan_terapi }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($r->detailRekamMedis->count() > 0)
                                                <ul class="ps-3 mb-0">
                                                    @foreach ($r->detailRekamMedis as $d)
                                                        <li>{{ $d->detail ?? '-' }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-4">Belum ada data rekam medis.</td>
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