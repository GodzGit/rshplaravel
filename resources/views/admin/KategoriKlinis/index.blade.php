<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Klinis</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kategori Klinis</h2>
    <button class="btn"><a href="{{ route('admin.dashboard') }}">Kembali</a></button>
    <form action="{{ route('admin.KategoriKlinis.create') }}" method="GET" class="d-inline justify-content-end">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kategori Klinis  
        </button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori Klinis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriKlinis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kategori_klinis }}</td>
                <td class="justify-content-end">
                    <a href="#" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                        <button type="submit" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>