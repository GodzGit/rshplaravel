@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Kelola Pet</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pet</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pet</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.Pet.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg"></i> Tambah Pet
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Pet</th>
                                    <th>Pemilik</th>
                                    <th>Ras</th>
                                    <th>Gender</th>
                                    <th>Warna</th>
                                    <th>Tgl Lahir</th>
                                    <th style="width: 180px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pet as $p)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>
                                        {{ $p->nama_pemilik ?? '-' }}
                                    </td>
                                    <td>{{ $p->nama_ras }}</td>
                                    <td>{{ $p->jenis_kelamin == 'L' ? 'Jantan' : 'Betina' }}</td>
                                    <td>{{ $p->warna_tanda }}</td>
                                    <td>{{ $p->tanggal_lahir }}</td>
                                    <td>
                                        <a href="{{ route('admin.Pet.edit', $p->idpet) }}" class="btn btn-warning btn-sm me-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.Pet.destroy', $p->idpet) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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