<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">RSHP</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            
            @php
                $role = Auth::user()->activeRole->role->nama_role ?? null;
            @endphp


            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                {{-- MENU UMUM (Dilihat Semua User) --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- MENU ADMINISTRATOR --}}
                {{-- Pastikan nama di database 'Admin' atau 'Administrator', sesuaikan string di bawah --}}
                @if ($role === 'Admin' || $role === 'Administrator')
                    <li class="nav-header">ADMINISTRATOR</li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-box-seam-fill"></i>
                            <p>
                                Master Data
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.JenisHewan.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Jenis Hewan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.RasHewan.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Ras Hewan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.Pet.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Pet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.User.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.Role.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.kategori.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.KategoriKlinis.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Kategori Klinis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.KodeTindakan.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Kode Tindakan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.perawat.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Tambah Perawat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.dokter.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i> <p>Tambah Dokter</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- MENU DOKTER --}}
                @if ($role === 'Dokter')
                    <li class="nav-header">MODUL DOKTER</li>
                    <li class="nav-item">
                        {{-- Pastikan route ini ada di web.php, jika belum ada ganti '#' --}}
                        <a href="{{ route('dokter.rekam.index') }}" class="nav-link"> 
                            <i class="nav-icon bi bi-journal-medical"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>
                @endif

                {{-- MENU PERAWAT --}}
                @if ($role === 'Perawat')
                    <li class="nav-header">MODUL PERAWAT</li>
                    <li class="nav-item">
                        <a href="{{ route('perawat.RekamMedis.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-list-task"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>
                @endif

                {{-- MENU RESEPSIONIS --}}
                @if ($role === 'Resepsionis')
                    <li class="nav-header">MODUL RESEPSIONIS</li>
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.Pendaftaran.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-plus"></i>
                            <p>Daftar Pemilik dan Pet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('resepsionis.TemuDokter.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-calendar"></i>
                            <p>Temu Dokter</p>
                        </a>
                    </li>
                @endif

                {{-- MENU PEMILIK --}}
                @if ($role === 'Pemilik')
                    <li class="nav-header">AREA PEMILIK</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-heart"></i>
                            <p>Riwayat Medis Pet</p>
                        </a>
                    </li>
                @endif

                {{-- LOGOUT (Wajib ada biar bisa keluar) --}}
                <li class="nav-item mt-4">
                     <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link bg-danger text-white">
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>

            </ul>
            </nav>
    </div>
    </aside>