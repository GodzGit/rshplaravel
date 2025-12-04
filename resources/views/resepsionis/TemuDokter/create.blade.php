@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tambah Temu Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.TemuDokter.index') }}">Temu Dokter</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6"> <div class="card card-success card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Form Ambil Antrian</h3>
                    </div>

                    <form action="{{ route('resepsionis.TemuDokter.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> Silahkan pilih hewan yang akan berobat untuk mendapatkan nomor antrian.
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilih Hewan Peliharaan <span class="text-danger">*</span></label>
                                <select name="idpet" class="form-control form-select" required>
                                    <option value="">-- Cari Nama Pet / Pemilik --</option>
                                    @foreach($pet as $p)
                                    <option value="{{ $p->idpet }}">
                                        {{ $p->nama }} 
                                        (Pemilik: {{ $p->pemilik->user->nama ?? 'Anonim' }}) 
                                        - {{ $p->ras->nama_ras ?? '' }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="form-text">Pastikan data pemilik sudah benar.</div>
                            </div>
                            
                            </div>
                        
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('resepsionis.TemuDokter.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-ticket-perforated"></i> Ambil Antrian
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection