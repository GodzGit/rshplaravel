@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Jenis Hewan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Jenis Hewan
                    </li>
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
                        <h3 class="card-title">Tabel Data Jenis Hewan</h3>
                        
                        <div class="card-tools">
                            <a href="{{ route('admin.JenisHewan.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg"></i> Tambah Jenis Hewan
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Jenis Hewan</th>
                                    <th style="width: 200px">Aksi</th> </tr>
                            </thead>
                            <tbody>
                                @foreach($jenisHewan as $index => $hewan)
                                <tr class="align-middle">
                                    <td>{{ $index + 1 }}.</td>
                                    <td>{{ $hewan->nama_jenis_hewan }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm me-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Yakin ingin menghapus data ini?')) {document.getElementById('delete-form-{{ $hewan->idjenis_hewan }}').submit();}">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>

                                        <form id="delete-form-{{ $hewan->idjenis_hewan }}" action="#" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
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