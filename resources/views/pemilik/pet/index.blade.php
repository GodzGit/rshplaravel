@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Hewan Peliharaan Saya</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Hewan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">List Data Hewan</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Hewan</th>
                                <th>Ras</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pet as $p)
                            <tr class="align-middle">
                                <td class="fw-bold">{{ $p->nama }}</td>
                                <td>{{ $p->nama_ras ?? '-' }}</td>
                                <td>
                                    @if($p->jenis_kelamin == 'L')
                                        <span class="badge text-bg-info">Jantan</span>
                                    @else
                                        <span class="badge text-bg-danger">Betina</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pemilik.pet.show', $p->idpet) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection