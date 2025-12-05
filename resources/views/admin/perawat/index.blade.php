@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Perawat</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perawat</li>
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
                        <h3 class="card-title">Daftar Perawat</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.perawat.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-person-plus-fill"></i> Tambah Perawat
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
                                        <th>No. HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pendidikan</th>
                                        <th>Alamat</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($perawat as $p)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td class="fw-bold">{{ $p->user->nama ?? 'User tidak ditemukan' }}</td>
                                        <td>{{ $p->no_hp }}</td>
                                        <td>
                                            @if($p->jenis_kelamin == 'L')
                                                <span class="badge text-bg-info">Laki-laki</span>
                                            @else
                                                <span class="badge text-bg-warning">Perempuan</span>
                                            @endif
                                        </td>
                                        <td>{{ $p->pendidikan }}</td>
                                        <td>{{ Str::limit($p->alamat, 30) }}</td>
                                        <td>
                                            <a href="{{ route('admin.perawat.edit', $p->idperawat) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.perawat.destroy', $p->idperawat) }}" class="d-inline" method="POST" onsubmit="return confirm('Hapus data perawat ini?')">
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
                                        <td colspan="7" class="text-center p-4">Belum ada data perawat.</td>
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