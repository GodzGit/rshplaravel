<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ras</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.admin')

@section('content')
<h2>Daftar Ras Hewan</h2>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Ras</th>
      <th>Jenis Hewan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($ras as $row)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $row->nama_ras }}</td>
      <td>{{ $row->JenisHewan   ->nama_jenis_hewan ?? '-' }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

</body>
</html>