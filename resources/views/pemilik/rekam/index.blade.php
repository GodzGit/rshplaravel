@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Riwayat Rekam Medis</h3></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rekam Medis</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Riwayat Kesehatan Hewan</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal Periksa</th>
                                <th>Nama Hewan</th>
                                <th>Keluhan (Anamnesa)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rekam as $r)
                            <tr>
                                <td>
                                    <i class="bi bi-clock"></i> 
                                    {{ $r->created_at ? \Carbon\Carbon::parse($r->created_at)->format('d M Y') : '-' }}
                                </td>
                                <td class="fw-bold">{{ $r->nama_pet }}</td>
                                <td>{{ Str::limit($r->anamnesa, 50) }}</td>
                                <td>
                                    <a href="{{ route('pemilik.rekam.detail', $r->idrekam_medis) }}" class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-file-earmark-medical"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection