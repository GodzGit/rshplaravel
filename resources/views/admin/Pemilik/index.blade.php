<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilik</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
        @extends('layouts.admin')

@section('content')
    <table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>No WA</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pemilik as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->user->nama }}</td>
            <td>{{ $item->user->no_wa }}</td>
            <td>{{ $item->alamat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
@endsection
</html>