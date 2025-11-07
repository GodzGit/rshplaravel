<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Temu Dokter</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Temu Dokter</h3>

    <form action="{{ route('resepsionis.TemuDokter.store') }}" method="POST">
        @csrf

        <label>Pilih Pet</label>
        <select name="idpet" class="form-control">
            @foreach ($pet as $p)
            <option value="{{ $p->idpet }}">
                {{ $p->nama }} - {{ $p->pemilik->user->nama }}
            </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary" style="margin-top:10px;">
            Simpan
        </button>
    </form>
</div>
@endsection

</body>
</html>