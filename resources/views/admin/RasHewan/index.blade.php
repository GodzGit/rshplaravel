<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ras</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<h2>Daftar Ras Hewan</h2>
<div class="mb-3">
    
<button class="btn"><a href="{{ route('admin.dashboard') }}">Kembali</a></button>
    <form action="{{ route('admin.RasHewan.create') }}" method="GET" class="d-inline justify-content-end">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Ras Hewan
        </button>
    </form>
</div>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Jenis Hewan</th>
      <th>Ras</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($ras as $row)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $row->JenisHewan   ->nama_jenis_hewan ?? '-' }}</td>
      <td>{{ $row->nama_ras }}</td>
      <td>
        <!-- Aksi seperti Edit dan Delete dapat ditambahkan di sini -->
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                    <i class="fas fa-edit">edit</i>
                </button>
                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Yakin ingin menghapus data ini?')) {document.getElementById('#').submit();}">
                    <i class="fas fa-trash">delete</i>
                </button>
                <form id="#" action="#" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

</body>
</html>