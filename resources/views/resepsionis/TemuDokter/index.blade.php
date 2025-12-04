@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Daftar Temu Dokter (Antrian)</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Temu Dokter</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                {{-- Alert Success --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card card-outline card-primary mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Antrian Hari Ini</h3>
                        <div class="card-tools">
                            <a href="{{ route('resepsionis.TemuDokter.tambah') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg"></i> Tambah Antrian Baru
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 100px">No. Urut</th>
                                        <th>Nama Pet</th>
                                        <th>Pemilik</th>
                                        <th>Waktu Daftar</th>
                                        <th>Status</th>
                                        <th style="width: 100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($temu as $t)
                                    <tr class="align-middle">
                                        {{-- Nomor Urut Besar --}}
                                        <td class="text-center">
                                            <span class="badge rounded-pill text-bg-secondary fs-6">{{ $t->no_urut }}</span>
                                        </td>
                                        
                                        <td class="fw-bold">{{ $t->pet->nama }}</td>
                                        
                                        <td>
                                            {{ $t->pet->pemilik->user->nama ?? '-' }}
                                        </td>

                                        <td>
                                            <i class="bi bi-clock"></i> {{ $t->waktu_daftar }}
                                        </td>
                                        
                                        <td>
                                            @if($t->status == 'Menunggu')
                                                <span class="badge text-bg-warning">Menunggu</span>
                                            @elseif($t->status == 'Diperiksa')
                                                <span class="badge text-bg-primary">Sedang Diperiksa</span>
                                            @elseif($t->status == 'Selesai')
                                                <span class="badge text-bg-success">Selesai</span>
                                            @else
                                                <span class="badge text-bg-secondary">{{ $t->status }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{-- Contoh tombol aksi (misal: diproses) --}}
                                            <a href="#" class="btn btn-success btn-sm" onclick="return confirm('Proses antrian ini?')" title="Proses">
                                                <i class="bi bi-check-lg"></i>
                                            </a>
                                            {{-- Contoh tombol aksi (misal: cancel) --}}
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Batalkan antrian ini?')" title="Batalkan">
                                                <i class="bi bi-x-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-4">
                                            <div class="text-muted">Tidak ada antrian saat ini.</div>
                                        </td>
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