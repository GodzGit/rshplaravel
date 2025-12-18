@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Status Antrian</h3></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Temu Dokter</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Daftar Antrian Anda</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No Urut</th>
                            <th>Nama Hewan</th>
                            <th>Waktu Daftar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($temu as $t)
                        <tr class="align-middle">
                            <td class="text-center">
                                <span class="badge rounded-pill text-bg-primary fs-6">{{ $t->no_urut }}</span>
                            </td>
                            <td class="fw-bold">{{ $t->nama_pet }}</td>
                            <td>{{ $t->waktu_daftar }}</td>
                            <td>
                                @if($t->status == 0)
                                    <span class="badge text-bg-secondary">Menunggu</span>
                                @elseif($t->status == 1)
                                    <span class="badge text-bg-success spinner-grow-sm">Selesai</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Anda belum mendaftar temu dokter.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection