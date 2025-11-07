<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Hewan</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

   
</head>
<body>
     @extends('layouts.admin')

@section('content')
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jenis Hewan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jenisHewan as $index => $hewan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $hewan->nama_jenis_hewan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
</body>
</html>
