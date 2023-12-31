<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand bg-gradient-success d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('ruang-admin/img/logo/logo.png') }}" class="shadow shadow-lg">
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ auth()->guard('admin')->check()? route('dashboard'): route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Registration
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('skos.create') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>SK Organisasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('skks.create') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>SK Kegiatan</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Bank File
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
                <a class="collapse-item" href="{{ route('struktur_organisasis.index') }}">Struktur Organisasi</a>
                <a class="collapse-item" href="{{ route('organisasis.index') }}">Organisasi</a>
                <a class="collapse-item" href="{{ route('skos.index') }}">Surat Keputusan</a>
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
                <a class="collapse-item" href="{{ route('skks.index') }}">Surat Keputusan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('arc.index') }}">
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
                <i class="fas fa-fw fa-cogs"></i>
                <span>Setting</span>
            </a>
            <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="collapse-inner rounded bg-white py-2">
                    <h6 class="collapse-header">Setting</h6>
                    <a class="collapse-item" href="{{ route('user.index') }}">User</a>
                    <a class="collapse-item" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    <a class="collapse-item" href="{{ route('prodi.index') }}">Program Studi</a>
                    <a class="collapse-item" href="{{ route('jurusan.index') }}">Jurusan</a>
                    <a class="collapse-item" href="{{ route('jenis_surat.index') }}">Jenis Surat</a>
                    <a class="collapse-item" href="{{ route('signature.index') }}">Signature</a>
                    <a class="collapse-item" href="{{ route('approval.index') }}">Approval</a>
                </div>
            </div>
        </li>
        @if (auth()->guard('admin')->user()->group_id == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('role.index') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Role</span>
                </a>
            </li>
        @endif
        <hr class="sidebar-divider">
    @endif
    <div class="version" id="version-ruangadmin"></div>
    <hr class="sidebar-divider">
</ul>
