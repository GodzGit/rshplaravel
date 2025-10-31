@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Dashboard Dokter</h1>
    <p>Selamat datang, {{ session('user_name') }}</p>
</div>
@endsection
