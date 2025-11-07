<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Hewan</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

   
</head>
<body>
     @extends('layouts.app')

@section('content')
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jenis Hewan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jenisHewan as $index => $hewan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $hewan->nama_jenis_hewan }}</td>
            <td>
                <!-- Aksi seperti Edit dan Delete dapat ditambahkan di sini -->
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='#'">
                    <i class="fas fa-edit">edit</i>
                </button>
                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Yakin ingin menghapus data ini?')) {document.getElementById('delete-form-{{ $hewan->idjenis_hewan }}').submit();}">
                    <i class="fas fa-trash">delete</i>
                </button>
                <form id="delete-form-{{ $hewan->idjenis_hewan }}" action="#" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mb-3">
    <form action="{{ route('admin.JenisHewan.create') }}" method="GET" class="d-inline">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Jenis Hewan
        </button>
    </form>
</div>
@endsection
</body>
</html>
