<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    <h1>Selamat Datang di Halaman Admin</h1>
    <p>Daftar kuasa admin</p>
    <button><a href="{{ route('admin.jenis-hewan.index') }}">Jenis Hewan</a></button>
    <button><a href="{{ route('admin.pemilik.index') }}">Pemilik</a></button>
    <button><a href="{{ route('admin.kategori.index') }}">Kategori</a></button>
    <button><a href="{{ route('admin.kategori-klinis.index') }}">Kategori Klinis</a></button>
    <button><a href="{{ route('admin.pet.index') }}">Pet</a></button>    
    <button><a href="{{ route('admin.ras-hewan.index') }}">Ras</a></button>
    <button><a href="{{ route('admin.role.index') }}">Role</a></button>
    <button><a href="{{ route('admin.user.index') }}">User</a></button>
</body>
</html>