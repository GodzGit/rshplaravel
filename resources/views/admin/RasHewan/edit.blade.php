@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Ras Hewan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.RasHewan.index') }}">Ras Hewan</a></li>
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
                        <h5 class="card-title">Form Edit Data</h5>
                    </div>

                    <form action="{{ route('admin.RasHewan.update', $ras->idras_hewan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Error!</strong> {{ $errors->first() }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            {{-- Nama Ras Hewan --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Ras Hewan</label>
                                <input 
                                    type="text" 
                                    name="nama_ras" 
                                    class="form-control @error('nama_ras') is-invalid @enderror" 
                                    value="{{ old('nama_ras', $ras->nama_ras) }}"
                                    required
                                >
                                @error('nama_ras')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jenis Hewan --}}
                            <div class="mb-3">
                                <label class="form-label">Jenis Hewan</label>
                                <select name="idjenis_hewan" class="form-control @error('idjenis_hewan') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis Hewan --</option>
                                    @foreach ($jenis as $j)
                                        <option 
                                            value="{{ $j->idjenis_hewan }}"
                                            {{ (old('idjenis_hewan', $ras->idjenis_hewan) == $j->idjenis_hewan) ? 'selected' : '' }}
                                        >
                                            {{ $j->nama_jenis_hewan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idjenis_hewan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.RasHewan.index') }}" class="btn btn-secondary">
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