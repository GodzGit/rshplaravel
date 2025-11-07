<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rekam Medis</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Rekam Medis</h3>

    <p><strong>Nama Pet:</strong> {{ $rm->temuDokter->pet->nama }}</p>
    <p><strong>Pemilik:</strong> {{ $rm->temuDokter->pet->pemilik->user->nama }}</p>
    <p><strong>Anamnesa:</strong> {{ $rm->anamnesa }}</p>
    <p><strong>Temuan Klinis:</strong> {{ $rm->temuan_klinis }}</p>
    <p><strong>Diagnosa:</strong> {{ $rm->diagnosa }}</p>

    <h4>Tindakan / Terapi</h4>
    <ul>
        @foreach ($rm->detailRekamMedis as $d)
        <li>{{ $d->kodeTindakan->deskripsi_tindakan_terapi }} — {{ $d->detail }}</li>
        @endforeach
    </ul>

    <a href="{{ route('dokter.RekamMedis.index') }}">Kembali</a>
</div>
@endsection

</body>
</html>