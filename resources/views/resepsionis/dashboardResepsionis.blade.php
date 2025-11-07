@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Dashboard Resepsionis</h3>
  <p>Selamat datang di dashboard resepsionis.</p>
  <ul>
    <li><a href="{{ route('resepsionis.Pendaftaran.index') }}">Kelola Pendaftaran</a></li>
    <li><a href="{{ route('resepsionis.TemuDokter.index') }}">Kelola Temu Dokter</a></li>
    <li><a href="{{ route('resepsionis.TemuDokter.tambah') }}">tambah Temu Dokter</a></li>
  </ul>
</div>
@endsection
