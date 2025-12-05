@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Dashboard Pemilik</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Total Hewan Peliharaan</h5>
                    <h2>{{ $jumlahPet }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Total Rekam Medis</h5>
                    <h2>{{ $rekamMedis }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Temu Dokter Terbaru</h5>
                    @if($temuTerbaru)
                        <p>{{ $temuTerbaru->waktu_daftar }}</p>
                    @else
                        <p>Belum ada</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
