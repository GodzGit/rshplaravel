<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>RSHP - Rumah Sakit Hewan Pendidikan</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>

<header>
  <nav>
    <a href=""><div class="logo-title"><img src="{{ asset('assets/img/rshpheader.jpg') }}" alt="Logo RSHP"></div></a>
    <a href="{{ route('beranda') }}">Home</a>
    <a href="{{ route('struktur') }}">Struktur Organisasi</a>
    <a href="{{ route('layanan') }}">Layanan Umum</a>
    <a href="{{ route('visi') }}">Visi, Misi, dan Tujuan</a>
    <a href="{{ route('login') }}">Login</a>
  </nav>
</header>

<main>
  <!-- Selamat Datang -->
  <section class="intro">
    <div class="text">
      <p>
        Selamat datang di <strong>Rumah Sakit Hewan Pendidikan (RSHP)</strong>. 
        Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk selalu meningkatkan kualitas pelayanan, maka dari itu Rumah Sakit Hewan Pendidikan Universitas Airlangga mempunyai fitur pendaftaran online yang mempermudah untuk mendaftarkan hewan kesayangan anda
      </p>
    </div>
    <div class="video">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/rCfvZPECZvE?si=QTpT23CrW2lDS0vS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
  </section>

  <!-- Berita -->
  <h2 class="judul-berita">Berita Terkini</h2>
  <section class="berita">
    <article>
      <a href="" class="berita-link"><img src="assets/img/b1.jpg" alt="">
      <h3>Tim satu sehat, juara 1 senam bugar airlangga</h3></a>
      <p><em>4 November 2024</em> — Tim Satu Sehat...</p>
    </article>
    <article>
      <a href="" class="berita-link"><img src="assets/img/b2.jpg" alt="">
      <h3>Seminar dan workshop sitologi RSHP 2024</h3></a>
      <p><em>27 Agustus 2024</em> — Seminar dan Workshop...</p>
    </article>
    <article>
      <a href="" class="berita-link"><img src="assets/img/b3.jpg" alt="">
      <h3>Seminar dan workshop FIESTA UROLOGI</h3></a>
      <p><em>21 Juli 2024</em> — RSHP Unair menjadi tempat...</p>
    </article>
  </section>

  <!-- Map & Video bawah -->
  <section class="map-video">
    <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7915.482022032093!2d112.788135!3d-7.270285!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1755249290488!5m2!1sid!2sid" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div>
      <img src="{{ asset('assets/img/map.jpg') }}" alt="">
    </div>
  </section>
</main>

<footer>
  <p>&copy; 2025 Universitas Airlangga. All Rights Reserved</p>
  <h2>RUMAH SAKIT HEWAN PENDIDIKAN</h2>
  <p>
    GEDUNG RS HEWAN PENDIDIKAN<br>
    Email: rshp@fkh.unair.ac.id<br>
    Telp: 031 5927832<br>
    Kampus C Universitas Airlangga<br>
    Surabaya 60115, Jawa Timur
  </p>
</footer>

</body>
</html>
