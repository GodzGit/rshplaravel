@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Dashboard Administrator</h3>
  <p>Selamat datang di dashboard administrator.</p>

  <ul>
    <li><a href="{{ route('admin.JenisHewan.index') }}">Kelola Jenis Hewan</a></li>
    <li><a href="{{ route('admin.RasHewan.index') }}">Kelola Ras Hewan</a></li>
    <li><a href="{{ route('admin.kategori.index') }}">Kelola Kategori</a></li>
    <li><a href="{{ route('admin.KategoriKlinis.index') }}">Kelola Kategori Klinis</a></li>
    <li><a href="{{ route('admin.KodeTindakan.index') }}">Kelola Kode Tindakan</a></li>
    <li><a href="{{ route('admin.Pet.index') }}">Kelola Pet</a></li>
    <li><a href="{{ route('admin.Role.index') }}">Kelola Role</a></li>
    <li><a href="{{ route('admin.User.index') }}">Kelola User</a></li>
  </ul>
</div>
@endsection
