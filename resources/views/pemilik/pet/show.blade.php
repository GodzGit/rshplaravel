@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Hewan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('pemilik.pet.index') }}">Daftar Hewan</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="bi bi-github"></i> Profil: <b>{{ $pet->nama }}</b>
                        </h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Nama:</strong> <span>{{ $pet->nama }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Ras:</strong> <span>{{ $pet->nama_ras }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Jenis Kelamin:</strong> 
                                <span>{{ $pet->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Warna / Tanda:</strong> <span>{{ $pet->warna_tanda }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Tanggal Lahir:</strong> <span>{{ $pet->tanggal_lahir }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('pemilik.pet.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection