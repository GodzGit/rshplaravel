@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Status Temu Dokter</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No Urut</th>
                <th>Nama Hewan</th>
                <th>Waktu Daftar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($temu as $t)
            <tr>
                <td>{{ $t->no_urut }}</td>
                <td>{{ $t->nama_pet }}</td>
                <td>{{ $t->waktu_daftar }}</td>
                <td>
                    @if($t->status == 0)
                        <span class="badge bg-secondary">Menunggu</span>
                    @elseif($t->status == 1)
                        <span class="badge bg-info">Sedang diperiksa</span>
                    @elseif($t->status == 2)
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
