@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dokter</li>
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
                        <h3 class="card-title">Daftar Dokter</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-person-plus-fill"></i> Tambah Dokter
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama User</th>
                                        <th>Bidang / Spesialis</th>
                                        <th>No. HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dokter as $d)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td class="fw-bold">{{ $d->user->nama ?? 'User tidak ditemukan' }}</td>
                                        <td><span class="badge text-bg-info">{{ $d->bidang_dokter }}</span></td>
                                        <td>{{ $d->no_hp }}</td>
                                        <td>
                                            @if($d->jenis_kelamin == 'L')
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($d->alamat, 25) }}</td>
                                        <td>
                                            <a href="{{ route('admin.dokter.edit', $d->iddokter) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.dokter.destroy', $d->iddokter) }}" class="d-inline" method="POST" onsubmit="return confirm('Hapus data dokter ini?')">
                                                @csrf 
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center p-4">Belum ada data dokter.</td>
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