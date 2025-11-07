<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temu Dokter</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Temu Dokter</h3>

    <a href="{{ route('resepsionis.TemuDokter.tambah') }}">Tambah Temu Dokter</a>

    <table class="table">
        <tr>
            <th>No Urut</th>
            <th>Nama Pet</th>
            <th>Pemilik</th>
            <th>Status</th>
            <th>Waktu Daftar</th>
        </tr>

        @foreach ($temu as $t)
        <tr>
            <td>{{ $t->no_urut }}</td>
            <td>{{ $t->pet->nama }}</td>
            <td>{{ $t->pet->pemilik->user->nama }}</td>
            <td>{{ $t->status }}</td>
            <td>{{ $t->waktu_daftar }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

</body>
</html>