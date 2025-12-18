@extends('layouts.lte.main')

@section('content')
<div class="card card-outline card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Pemilik</h3>
    </div>

    <form method="POST" action="{{ route('resepsionis.Pendaftaran.update', $pemilik->idpemilik) }}">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control"
                       value="{{ $pemilik->user->nama }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $pemilik->user->email }}">
            </div>

            <div class="mb-3">
                <label>No. WhatsApp</label>
                <input type="text" name="no_wa" class="form-control"
                       value="{{ $pemilik->no_wa }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $pemilik->alamat }}</textarea>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('resepsionis.Pendaftaran.index') }}" 
               class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
