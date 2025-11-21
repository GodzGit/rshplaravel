<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">RSHP</span>
            </a>
        </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

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
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Jenis Hewan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.RasHewan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ras Hewan</p>
                            </a>
                        </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.Pet.index') }}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>Pet</p>
                              </a>  
                          </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.User.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.Role.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kategori.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.KategoriKlinis.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori Klinis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.KodeTindakan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kode Tindakan</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            </nav>
    </div>
    </aside>