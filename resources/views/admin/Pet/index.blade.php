<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hewan</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Hewan Peliharaan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Hewan</th>
                <th>Tanggal Lahir</th>
                <th>Warna/Tanda</th>
                <th>Jenis Kelamin</th>
                <th>Pemilik</th>
                <th>Ras</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pet as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->warna_tanda }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->pemilik->user->nama ?? '-' }}</td>
                <td>{{ $item->rasHewan->nama_ras ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>