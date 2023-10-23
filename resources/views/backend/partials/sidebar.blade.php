<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand bg-gradient-success d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('ruang-admin/img/logo/logo.png') }}" class="shadow shadow-lg">
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        @if (auth()->guard('admin')->check())
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        @else
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Create SK Organisasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Create SK Kegiatan</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrganisasi"
            aria-expanded="true" aria-controls="collapseOrganisasi">
            <i class="far fa-fw fa-envelope"></i>
            <span>SK Organisasi</span>
        </a>
        <div id="collapseOrganisasi" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">SK Organisasi</h6>
                <a class="collapse-item" href="#">Kop Surat</a>
                <a class="collapse-item" href="#">Surat Keputusan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKegiatan"
            aria-expanded="true" aria-controls="collapseKegiatan">
            <i class="far fa-fw fa-envelope"></i>
            <span>SK Kegiatan</span>
        </a>
        <div id="collapseKegiatan" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">SK Kegiatan</h6>
                <a class="collapse-item" href="#">Kop Surat</a>
                <a class="collapse-item" href="#">Surat Keputusan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-archive"></i>
            <span>Archive</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    @if (auth()->guard('admin')->check())
        <div class="sidebar-heading">
            Configuration
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                aria-expanded="true" aria-controls="collapsePage">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Setting</span>
            </a>
            <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="collapse-inner rounded bg-white py-2">
                    <h6 class="collapse-header">Setting</h6>
                    <a class="collapse-item" href="{{ route('user.index') }}">User</a>
                    <a class="collapse-item" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    <a class="collapse-item" href="{{ route('jurusan.index') }}">Jurusan</a>
                    <a class="collapse-item" href="{{ route('prodi.index') }}">Program Studi</a>
                    <a class="collapse-item" href="#">Approval SK Organisasi</a>
                    <a class="collapse-item" href="#">Approval SK Kegiatan</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-cog"></i>
                <span>Role</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    @endif
    <div class="version" id="version-ruangadmin"></div>
    <hr class="sidebar-divider">
</ul>
