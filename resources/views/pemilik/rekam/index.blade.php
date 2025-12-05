@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Rekam Medis Hewan Saya</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Hewan</th>
                <th>Anamnesa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekam as $r)
            <tr>
                <td>{{ $r->created_at }}</td>
                <td>{{ $r->nama_pet }}</td>
                <td>{{ Str::limit($r->anamnesa, 50) }}</td>
                <td>
                    <a href="{{ route('pemilik.rekam.detail', $r->idrekam_medis) }}" class="btn btn-sm btn-primary">
                        Lihat Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
