@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Data Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dokter.index') }}">Dokter</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Dokter: <b>{{ $dokter->user->nama ?? '-' }}</b></h3>
                    </div>

                    <form action="{{ route('admin.dokter.update', $dokter->iddokter) }}" method="POST">
                        @csrf 
                        @method('PUT')

                        <div class="card-body">
                            {{-- User Selection (Optional: Biasanya user tidak bisa diganti saat edit, tapi jika perlu bisa diaktifkan) --}}
                            <div class="mb-3">
                                <label class="form-label">User Akun</label>
                                <select name="iduser" class="form-control form-select" required>
                                    <option value="">-- Pilih User --</option>
                                    @foreach ($users as $u)
                                        <option value="{{ $u->iduser }}" 
                                            {{ $dokter->iduser == $u->iduser ? 'selected' : '' }}>
                                            {{ $u->nama }} - {{ $u->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bidang / Spesialis</label>
                                        <input type="text" name="bidang_dokter" class="form-control" value="{{ $dokter->bidang_dokter }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control form-select">
                                            <option value="L" {{ $dokter->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ $dokter->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor HP</label>
                                        <input type="text" name="no_hp" value="{{ $dokter->no_hp }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control" rows="5">{{ $dokter->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update Data
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