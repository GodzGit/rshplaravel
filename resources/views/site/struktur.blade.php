@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

</head>
<body>


 <!-- STRUKTUR ORGANISASI -->
    <section id="struktur">
      <h2>Struktur Organisasi</h2>
      <p>Berikut struktur organisasi inti (ilustrasi):</p>

      <!-- LIST (unordered) -->
      <ul>
        <li>Direktur RSHP</li>
        <li>Wakil Direktur Pelayanan Medis, Pendidikan, dan Penelitian</li>
        <li>Wakil Direktur SDM, SarPras, dan Keuangan</li>
      </ul>

      <!-- TABEL (contoh struktur singkat) -->
      <table border="1" cellpadding="6" cellspacing="0">
        <thead>
          <tr>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>Kontak</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Direktur</td>
            <td>Dr, Ira Sari Yudanianti, M.P., drh.</td>
            <td><a href="mailto:irasariyudanianti@rshp.ac.id">irasariyudanianti@rshp.ac.id</a></td>
          </tr>
          <tr>
            <td>Wadir 1 - Pelayanan medis, Pendidikan, dan Penelitian</td>
            <td>Dr. Nusdianto Triakoso, M.P., drh.</td></td>
            <td><a href="mailto:nusdiantotriakoso@rshp.ac.id">nusdiantotriakoso@rshp.ac.id</a></td>
          </tr>
          <tr>
            <td>Wadir 2 - SDM, SarPras, dan Keuangan</td>
            <td>Dr. Miyayu Soneta S., M.Vet., drh.</td>
            <td><a href="mailto:miyayusonetas@rshp.ac.id">miyayusonetas@rshp.ac.id</a></td>
          </tr>
        </tbody>
      </table>
      <hr>
    </section>

</body>
</html>
@endsection