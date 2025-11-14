@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah User</h4>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.User.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="">Role</label>
            <select name="idrole" class="form-control" required>
                <option value="">-- pilih role --</option>
                @foreach($role as $r)
                <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
