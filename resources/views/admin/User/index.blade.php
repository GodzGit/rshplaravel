<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar User</h2>
    <button class="btn"><a href="{{ route('admin.dashboard') }}">Kembali</a></button>
    <form action="{{ route('admin.User.create') }}" method="GET" class="d-inline justify-content-end">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah User  
        </button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->activeRole->role->nama_role ?? '-' }}</td>
                <td class="justify-content-end">
                    <a href="#" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                        @csrf
                        @method('DELETE')
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