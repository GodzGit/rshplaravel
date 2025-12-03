@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Pendaftaran (Registrasi)</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pendaftaran</li>
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
                        <h3 class="card-title">Data Pemilik & Pet</h3>
                        <div class="card-tools">
                            {{-- Tombol Registrasi Pemilik --}}
                            <a href="{{ route('resepsionis.Pendaftaran.createPemilik') }}" class="btn btn-primary btn-sm" title="Daftar Pemilik Baru">
                                <i class="bi bi-person-plus-fill"></i> Registrasi Pemilik
                            </a>
                            {{-- Tombol Registrasi Pet --}}
                            <a href="{{ route('resepsionis.Pendaftaran.createPet') }}" class="btn btn-success btn-sm ms-1" title="Tambah Hewan Peliharaan">
                                <i class="bi bi-github"></i> Registrasi Pet
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Pemilik</th>
                                        <th>Kontak (WA)</th>
                                        <th>Alamat</th>
                                        <th>Daftar Hewan</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pemilik as $p)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td class="fw-bold">{{ $p->user->nama ?? 'User Hilang' }}</td>
                                        <td>
                                            <a href="https://wa.me/{{ $p->no_wa }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-whatsapp text-success"></i> {{ $p->no_wa }}
                                            </a>
                                        </td>
                                        <td>{{ Str::limit($p->alamat, 30) }}</td>
                                        <td>
                                            @if($p->pet->count() > 0)
                                                <ul class="list-unstyled mb-0">
                                                    @foreach ($p->pet as $pet)
                                                        <li>
                                                            <i class="bi bi-paw text-muted"></i> 
                                                            {{ $pet->nama }} <small class="text-muted">({{ $pet->ras->nama_ras ?? '-' }})</small>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span class="badge text-bg-secondary">Belum ada hewan</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Hapus data ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-4">
                                            <div class="text-muted">Belum ada data pendaftaran.</div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <a href="{{ route('resepsionis.dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection