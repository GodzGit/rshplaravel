@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard Pemilik</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            
            {{-- Widget Hewan --}}
            <div class="col-lg-4 col-6">
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{ $jumlahPet }}</h3>
                        <p>Hewan Peliharaan</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-github"></i>
                    </div>
                    <a href="{{ route('pemilik.pet.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Lihat Detail <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>

            {{-- Widget Rekam Medis --}}
            <div class="col-lg-4 col-6">
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>{{ $rekamMedis }}</h3>
                        <p>Riwayat Rekam Medis</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>
                    <a href="{{ route('pemilik.rekam.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Lihat Riwayat <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>

            {{-- Widget Antrian --}}
            <div class="col-lg-4 col-12">
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        @if($temuTerbaru)
                            <h3>{{ $temuTerbaru->no_urut }}</h3>
                            <p>Antrian Terakhir: {{ $temuTerbaru->waktu_daftar }}</p>
                        @else
                            <h3>-</h3>
                            <p>Belum ada antrian</p>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <a href="{{ route('resepsionis.TemuDokter.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Cek Status <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection