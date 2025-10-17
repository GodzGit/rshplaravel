@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi, Misi, dan Tujuan</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
<header>
  <nav>
    <a href=""><div class="logo-title"><img src="{{ asset('assets/img/rshpheader.jpg') }}" alt="Logo RSHP"></div></a>
    <a href="{{ route('beranda') }}">Home</a>|
    <a href="{{ route('struktur') }}">Struktur Organisasi</a>|
    <a href="{{ route('layanan') }}">Layanan Umum</a>|
    <a href="{{ route('visi') }}">Visi, Misi, dan Tujuan</a>|
    <a href="{{ route('login') }}">Login</a>
  </nav>
</header>


    <!-- VISI MISI DAN TUJUAN -->
<section id="visi">
  <h2>Visi, Misi, dan Tujuan</h2>

    <h3>
        Rumah Sakit Hewan Pendidikan (RSHP) Universitas Airlangga dalam melaksanakan tugas dan fungsinya, mempunyai visi dan misi:
    </h3>

    <h3>Visi</h3>
    <p>
        Menjadi Rumah Sakit Hewan Pendidikan terkemuka di tingkat nasional dan internasional dalam pemberian pelayanan paripurna, pendidikan, dan penelitian di bidang kesehatan hewan, yang unggul dan mandiri serta bermartabat berdasarkan moral, agama, etika dengan tetap berorientasi pada kesejahteraan masyarakat.
    </p>

    <h3>Misi</h3>
    <ol>
        <li>Menyelenggarakan fungsi pelayanan terintegrasi, bermutu dan mengutamakan keselamatan dan kesehatan pasien (klien).</li>
        <li>Menyelenggarakan pendidikan dan pelatihan terintegrasi bidang kedokteran hewan dan kesehatan lainnya untuk menghasilkan lulusan atau tenaga kesehatan yang kompeten di bidangnya.</li>
        <li>Melakukan penelitian terintegrasi berbasis pada keunggulan bidang kedokteran hewan dan kesehatan lainnya yang berorientasi pada produk inovasi.</li>
        <li>Menjadi pusat rujukan pelayanan kedokteran hewan dan kesehatan lain yang unggul.</li>
        <li>Mengembangkan manajemen rumah sakit hewan yang produktif, efisien, bermutu, dan berbasis kinerja.</li>
    </ol>

    <h3>Tujuan</h3>
    <ul>
        <li>Menjadi Rumah Sakit Hewan yang adaptif, kreatif dan proaktif terhadap tuntutan perkembangan ilmu pengetahuan dan teknologi di bidang pengobatan kesehatan hewan.</li>
        <li>Menjadi Rumah Sakit Hewan mandiri yang bertatakelola baik.</li>
    </ul>

  <p>
    Kembali ke <a href="{{ route('beranda') }}">halaman awal</a> atau lihat <a href="{{ route('layanan') }}">Layanan Umum</a>.
  </p>
  <hr>
</section>


</body>
</html>
@endsection