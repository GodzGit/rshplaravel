<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    @extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Role</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($role as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>