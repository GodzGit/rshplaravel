<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendafataran pemilik pet</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Registrasi Pemilik & Pet</h3>

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>No. WA</th>
            <th>Alamat</th>
            <th>Daftar Pet</th>
        </tr>

        @foreach ($pemilik as $no => $p)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $p->user->nama }}</td>
            <td>{{ $p->no_wa }}</td>
            <td>{{ $p->alamat }}</td>
            <td>
                @foreach ($p->pet as $pet)
                    - {{ $pet->nama }} <br>
                @endforeach
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

</body>
</html>