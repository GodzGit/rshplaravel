@extends('layouts.lte.main')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit User</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.User.index') }}">User</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Form Edit User</h5>
                    </div>

                    <form action="{{ route('admin.User.update', $user->iduser) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control"
                                       value="{{ $user->nama }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password <small class="text-muted">(Opsional)</small></label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="Kosongkan jika tidak ingin mengganti password">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="idrole" class="form-control" required>
                                    @foreach($role as $r)
                                        <option value="{{ $r->idrole }}"
                                            {{ (isset($roleUser) && $roleUser->idrole == $r->idrole) ? 'selected' : '' }}>
                                            {{ $r->nama_role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.User.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection