@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Detail Rekam Medis</h3>

    <div class="card mb-3">
        <div class="card-body">

            <p><strong>Tanggal:</strong> {{ $rekam->created_at }}</p>
            <p><strong>Anamnesa:</strong> {{ $rekam->anamnesa }}</p>
            <p><strong>Temuan Klinis:</strong> {{ $rekam->temuan_klinis }}</p>
            <p><strong>Diagnosa:</strong> {{ $rekam->diagnosa }}</p>

        </div>
    </div>

    <h4>Tindakan / Terapi</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail as $d)
            <tr>
                <td>{{ $d->kode }}</td>
                <td>{{ $d->deskripsi_tindakan_terapi }}</td>
                <td>{{ $d->detail }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('pemilik.rekam.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
@endsection
