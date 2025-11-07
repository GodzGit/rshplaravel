@extends('layouts.app')

@section('content')
<div class="container ">
    <h1>Dashboard Perawat</h1>
    <p>Selamat datang, {{ session('user_name') }}</p>
    <ul>
        <li><a href="{{ route('perawat.RekamMedis.index') }}">Lihat Rekam Medis</a></li>
    </ul>
</div>
@endsection
