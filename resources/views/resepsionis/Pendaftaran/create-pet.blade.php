@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Registrasi Hewan Peliharaan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('resepsionis.Pendaftaran.index') }}">Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Pet Baru</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-success card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Form Data Pet</h3>
                    </div>

                    <form action="{{ route('resepsionis.Pendaftaran.storePet') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            
                            {{-- Pilih Pemilik --}}
                            <div class="mb-3">
                                <label class="form-label">Pemilik <span class="text-danger">*</span></label>
                                <select name="idpemilik" class="form-control form-select" required>
                                    <option value="">-- Cari Pemilik --</option>
                                    @foreach($pemilik as $p)
                                        <option value="{{ $p->idpemilik }}">
                                            {{ $p->user->nama }} (WA: {{ $p->no_wa }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Nama Pet --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Hewan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                    <input type="text" name="nama" class="form-control" required placeholder="Nama panggilan hewan">
                                </div>
                            </div>

                            <div class="row">
                                {{-- Ras Hewan --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jenis & Ras <span class="text-danger">*</span></label>
                                    <select name="idras_hewan" class="form-control form-select" required>
                                        <option value="">-- Pilih Ras --</option>
                                        @foreach($ras as $r)
                                            <option value="{{ $r->idras_hewan }}">
                                                {{ $r->jenisHewan->nama_jenis_hewan }} - {{ $r->nama_ras }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Warna --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Warna / Tanda</label>
                                    <input type="text" name="warna_tanda" class="form-control" required placeholder="Cth: Putih Polos">
                                </div>
                            </div>

                            <div class="row">
                                {{-- Jenis Kelamin --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" class="form-control form-select" required>
                                        <option value="">-- Pilih Gender --</option>
                                        <option value="L">Jantan (Laki-laki)</option>
                                        <option value="P">Betina (Perempuan)</option>
                                    </select>
                                </div>

                                {{-- Tanggal Lahir --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('resepsionis.Pendaftaran.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Simpan Data Pet
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