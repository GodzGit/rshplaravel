@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Dokter</h1>
    <p>Selamat datang, {{ session('user_name') }}</p>
    <ul>
        <li><a href="{{ route('dokter.RekamMedis.index') }}">Lihat Rekam Medis</a></li>
    </ul>
</div>
@endsection
