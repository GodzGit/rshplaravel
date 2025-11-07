<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Rekam Medis</h3>

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Pet</th>
            <th>Pemilik</th>
            <th>Diagnosa</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        @foreach ($rekam as $no => $r)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td>{{ $r->temuDokter->pet->nama }}</td>
            <td>{{ $r->temuDokter->pet->pemilik->user->nama }}</td>
            <td>{{ $r->diagnosa }}</td>
            <td>{{ $r->created_at }}</td>
            <td>
                <a href="{{ route('perawat.RekamMedis.show', $r->idrekam_medis) }}">Detail</a>
            </td>
        </tr>
        @endforeach
    </table>
    <button class="btn"><a href="{{ route('perawat.dashboard') }}">Kembali</a></button>
</div>
@endsection

</body>
</html>