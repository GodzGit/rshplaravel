@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7">

      <div class="card">
        <div class="card-header">
          <h5>Tambah Kode Tindakan</h5>
        </div>

        <div class="card-body">

          <form action="{{ route('admin.KodeTindakan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label class="form-label">Kode <span class="text-danger">*</span></label>
              <input type="text" name="kode"
                     class="form-control @error('kode') is-invalid @enderror"
                     value="{{ old('kode') }}" required>
              @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Nama Tindakan <span class="text-danger">*</span></label>
              <input type="text" name="nama_tindakan"
                     class="form-control @error('nama_tindakan') is-invalid @enderror"
                     value="{{ old('nama_tindakan') }}" required>
              @error('nama_tindakan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Tindakan <span class="text-danger">*</span></label>
                <textarea name="deskripsi_tindakan_terapi"
                        class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror"
                        rows="4"
                        required>{{ old('deskripsi_tindakan_terapi') }}</textarea>
                @error('deskripsi_tindakan_terapi') 
                    <div class="invalid-feedback">{{ $message }}</div> 
                @enderror
            </div>


            <div class="mb-3">
              <label class="form-label">Kategori <span class="text-danger">*</span></label>
              <select name="idkategori"
                      class="form-control @error('idkategori') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                  <option value="{{ $k->idkategori }}">{{ $k->nama_kategori }}</option>
                @endforeach
              </select>
              @error('idkategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Kategori Klinis <span class="text-danger">*</span></label>
              <select name="idkategori_klinis"
                      class="form-control @error('idkategori_klinis') is-invalid @enderror">
                <option value="">-- Pilih Kategori Klinis --</option>
                @foreach ($kategoriKlinis as $k)
                  <option value="{{ $k->idkategori_klinis }}">{{ $k->nama_kategori_klinis }}</option>
                @endforeach
              </select>
              @error('idkategori_klinis') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('admin.KodeTindakan.index') }}" class="btn btn-secondary">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection
