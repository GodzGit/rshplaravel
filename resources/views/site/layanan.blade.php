@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Umum</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    <!-- LAYANAN UMUM -->
    <section id="layanan">
      <h2>Layanan Umum</h2>
      
      <p>Rumah Sakit Hewan Pendidikan Universitas Airlangga melakukan layanan-layanan, baik atas kehendak klien atau rujukan dokter hewan praktisi sebagai berikut:</p>

      <h3>Poliklinik</h3>

      <p>Poliklinik adalah layanan rawat jalan dimana pelayanan kesehatan hewan dilakukan tanpa pasien menginap. Poliklinik melayani tindakan observasi, diagnosis, pengobatan, rehabilitasi medik, serta pelayanan kesehatan lainnya seperti permintaan surat keterangan sehat. Tindakan observasi dan diagnosis, juga bisa diteguhkan dengan berbagai macam pemeriksaan yang bisa kami lakukan, misalnya pemeriksaan sitologi, dermatologi, hematologi, atau pemeriksaan radiologi, ultrasonografi, bahkan pemeriksaan elektrokardiografi. Bilamana diperlukan pemeriksaan-pemeriksaan lain yang diperlukan seperti pemeriksaan kultur bakteri, atau pemeriksaan jaringan/histopatologi, dan lain-lain kami bekerja sama dengan Fakultas Kedokteran Hewan Universitas Airlangga untuk membantu melakukan pemeriksaan-pemeriksaan tersebut. Selain itu kami mempunyai rapid test untuk pemeriksaan cepat, untuk meneguhkan diagnosa penyakit-penyakit berbahaya pada kucing seperti panleukopenia, calicivirus, rhinotracheitis, FIP, dan pada anjing seperti parvovirus, canine distemper.</p>
      <p>Layanan kesehatan hewan di poliklinik yang kami lakukan antara lain:</p>
      <ul>
        <li>Rawat jalan</li>
        <li>Vaksinasi</li>
        <li>Akupuntur</li>
        <li>Kemoterapi</li>
        <li>Fisioterapi</li>
        <li>Mandi Terapi</li>
      </ul>

      <h3>Rawat Inap</h3>

      <p>Rawat inap dilakukan pada pasien-pasien yang berat atau parah dan membutuhkan perawatan intensif. Pasien akan diobservasi dan mendapat perawatan intensif dibawah pengawasan dokter dan paramedis yang handal. Sebelum rawat inap, klien wajib mengisi inform konsen yang artinya klien telah diberi penjelasan yang detail tentang kondisi penyakit pasien dan menyetujui rencana terapi yang akan dijalankan sepengetahuan klien. Klien juga diberitahu biaya yang dibebankan untuk semua layanan. RSHP menerima pembayaran tunai maupun kartu debit bank.</p>

      <h3>Bedah</h3>

      <ul>
        <li>tindakan bedah minor
            <ul>
                <li>Jahit Luka</li>
                <li>Kastrasi</li>
                <li>Ohthematoma</li>
                <li>Scaling - root planning</li>
                <li>Ekstraksi gigi</li>
            </ul>
        </li>
        <li>tindakan bedah major
            <ul>
                <li>Gastrotomi; Entrotomi; Enterektomi; Salivary mucocele</li>
                <li>Ovariohisterektomi; Sectio caesar; Piometra</li>
                <li>Sistotomi; Urethrostomi</li>
                <li>Fraktur tulang</li>
                <li>Hernia diafragmatika</li>
                <li>Hernia perinealis</li>
                <li>Hernia inguinalis</li>
                <li>Eksisi tumor</li>
            </ul>
        </li>
      </ul>

      
      <h3>Pemeriksaan</h3>
      <ul>
        <li>Pemeriksaan Sitologi</li>
        <li>Pemeriksaan Dermatologi</li>
        <li>Pemeriksaan Hematologi</li>
        <li>Pemeriksaan Radiografi</li>
        <li>Pemeriksaan Ultrasonografi</li>
      </ul>
      <p>Selain layanan medis, Rumah Sakit Hewan Pendidikan Universitas Airlangga juga melayani grooming pada hewan kesayangan.</p>



      <!-- HYPERLINK internal -->
      <p>
        Lihat juga <a href="{{ route('visi') }}">Visi, Misi, dan Tujuan</a>.
      </p>
      <hr>
    </section>

</body>
</html>
@endsection