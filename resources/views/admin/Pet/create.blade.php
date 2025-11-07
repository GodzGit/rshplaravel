@extends('layouts.app')

@section('content')
<div class="container">

    <h4>Tambah Pet</h4>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.Pet.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Pet</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Warna / Tanda</label>
            <input type="text" name="warna_tanda" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Pemilik</label>
            <select name="idpemilik" class="form-control" required>
                @foreach($pemilik as $p)
                    <option value="{{ $p->idpemilik }}">
                        {{ $p->user->nama }} - {{ $p->no_wa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Ras Hewan</label>
            <select name="idras_hewan" class="form-control" required>
                @foreach($ras as $r)
                    <option value="{{ $r->idras_hewan }}">
                        {{ $r->nama_ras }} ({{ $r->jenisHewan->nama_jenis_hewan }})
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection
