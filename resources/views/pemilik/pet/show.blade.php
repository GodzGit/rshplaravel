@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Detail Hewan: {{ $pet->nama }}</h3>

    <div class="card">
        <div class="card-body">

            <p><strong>Nama Hewan:</strong> {{ $pet->nama }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $pet->tanggal_lahir }}</p>
            <p><strong>Warna & Tanda:</strong> {{ $pet->warna_tanda }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $pet->jenis_kelamin }}</p>
            <p><strong>Ras:</strong> {{ $pet->nama_ras }}</p>

            <a href="{{ route('pemilik.pet.index') }}" class="btn btn-secondary mt-3">
                Kembali
            </a>

        </div>
    </div>

</div>
@endsection
