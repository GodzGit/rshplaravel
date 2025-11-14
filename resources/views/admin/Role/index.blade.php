<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Role</h2>
    <button class="btn"><a href="{{ route('admin.dashboard') }}">Kembali</a></button>
    <form action="{{ route('admin.Role.create') }}" method="GET" class="d-inline justify-content-end">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Role  
        </button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($role as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_role }}</td>
                <td class="justify-content-end">
                    <a href="#" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>