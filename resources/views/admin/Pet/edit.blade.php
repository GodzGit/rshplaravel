@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Data Pet</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.Pet.index') }}">Pet</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Form Edit Pet</h5>
                    </div>

                    <form action="{{ route('admin.Pet.update', $pet->idpet) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $errors->first() }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            {{-- Nama Pet (Konsisten dengan Create: nama) --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Pet</label>
                                <input type="text" name="nama" class="form-control"
                                       value="{{ old('nama', $pet->nama) }}" required>
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                       value="{{ old('tanggal_lahir', $pet->tanggal_lahir) }}" required>
                            </div>

                            {{-- Warna --}}
                            <div class="mb-3">
                                <label class="form-label">Warna / Tanda</label>
                                <input type="text" name="warna_tanda" class="form-control"
                                       value="{{ old('warna_tanda', $pet->warna_tanda) }}">
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L" {{ $pet->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki (Jantan)</option>
                                    <option value="P" {{ $pet->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan (Betina)</option>
                                </select>
                            </div>

                            {{-- Pemilik --}}
                            <div class="mb-3">
                                <label class="form-label">Pemilik</label>
                                <select name="idpemilik" class="form-control" required>
                                    <option value="">-- Pilih Pemilik --</option>
                                    @foreach($pemilik as $p)
                                        <option value="{{ $p->idpemilik }}"
                                            {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                                            {{ $p->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Ras Hewan (Memilih Ras otomatis menentukan Jenis Hewan) --}}
                            <div class="mb-3">
                                <label class="form-label">Ras Hewan</label>
                                <select name="idras_hewan" class="form-control" required>
                                    <option value="">-- pilih ras hewan --</option>
                                    @foreach($ras as $r)
                                        <option value="{{ $r->idras_hewan }}"
                                            {{ $pet->idras_hewan == $r->idras_hewan ? 'selected' : '' }}>
                                            {{ $r->nama_ras }} ({{ $r->nama_jenis_hewan }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.Pet.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update
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