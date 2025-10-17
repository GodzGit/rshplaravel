<body>

  <header>
    <nav>
      <a href="{{ route('beranda') }}"><div class="logo-title"><img src="{{ asset('assets/img/rshpheader.jpg') }}" alt="Logo RSHP"></div></a>
      <a href="{{ route('beranda') }}">Home</a> |
      <a href="{{ route('struktur') }}">Struktur Organisasi</a> |
      <a href="{{ route('layanan') }}">Layanan Umum</a> |
      <a href="{{ route('visi') }}">Visi, Misi, dan Tujuan</a> |
      <a href="{{ route('login') }}">Login</a>
    </nav>
  </header>

  <main>
    @yield('content')
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
