@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Kelola Pet</h3>

    <button class="btn"><a href="{{ route('admin.dashboard') }}">Kembali</a></button>
    <form action="{{ route('admin.Pet.create') }}" method="GET" class="d-inline justify-content-end">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pet  
        </button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pet</th>
                <th>Pemilik</th>
                <th>Ras</th>
                <th>Jenis Kelamin</th>
                <th>Warna</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pet as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->pemilik->user->nama ?? '-' }}</td>
                <td>{{ $p->ras->nama_ras }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->warna_tanda }}</td>
                <td>{{ $p->tanggal_lahir }}</td>
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
