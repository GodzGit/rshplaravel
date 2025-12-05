@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Daftar Hewan Peliharaan</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Ras</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pet as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nama_ras ?? '-' }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>
                    <a href="{{ route('pemilik.pet.show', $p->idpet) }}" class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
