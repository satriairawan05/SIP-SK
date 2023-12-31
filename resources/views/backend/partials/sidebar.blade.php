@php
    $approval = App\Models\Approval::where(
        'user_id',auth()->guard('admin')->user()->id
    )->first();
    if ($approval) {
        $skksCount = App\Models\SuratKeputusanKegiatan::where('skk_approved_step', $approval->user_id)->count();
        $skosCount = App\Models\SuratKeputusanOrganisasi::where('sko_approved_step', $approval->user_id)->count();
    } else {
        $skksCount = App\Models\SuratKeputusanKegiatan::count();
        $skosCount = App\Models\SuratKeputusanOrganisasi::count();
    }
@endphp

<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand bg-gradient-success d-flex align-items-center justify-content-center"
        href="{{ auth()->guard('admin')->check()? route('dashboard'): route('home') }}">
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
        Pembuatan Surat
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('sko.create') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>SK Organisasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('skk.create') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>SK Kegiatan</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        SK Menunggu Persetujuan
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrganisasi"
            aria-expanded="true" aria-controls="collapseOrganisasi">
            <i class="far fa-fw fa-envelope"></i>
            <span>SK Organisasi</span>
            @if ($skosCount > 0)
                <span class="badge rounded-pill badge-success">{{ $skosCount }}</span>
            @endif
        </a>
        <div id="collapseOrganisasi" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">SK Organisasi</h6>
                <a class="collapse-item" href="{{ route('struktur_organisasi.index') }}">Struktur Organisasi</a>
                <a class="collapse-item" href="{{ route('organisasi.index') }}">Organisasi</a>
                <a class="collapse-item" href="{{ route('sko.index') }}">Surat Keputusan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKegiatan"
            aria-expanded="true" aria-controls="collapseKegiatan">
            <i class="far fa-fw fa-envelope"></i>
            <span>SK Kegiatan</span>
            @if ($skksCount > 0)
                <span class="badge rounded-pill badge-success">{{ $skksCount }}</span>
            @endif
        </a>
        <div id="collapseKegiatan" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded bg-white py-2">
                <h6 class="collapse-header">SK Kegiatan</h6>
                <a class="collapse-item" href="{{ route('skk.index') }}">Surat Keputusan
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('archive.index') }}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Penyimpanan SK</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    @if (auth()->guard('admin')->user()->id == 1)
        <div class="sidebar-heading">
            Configuration
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                aria-expanded="true" aria-controls="collapsePage">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Semua Data</span>
            </a>
            <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="collapse-inner rounded bg-white py-2">
                    <h6 class="collapse-header">Semua Data</h6>
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
        {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('role.index') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Role</span>
                </a>
            </li> --}}
        <hr class="sidebar-divider">
    @endif
    <div class="version" id="version-ruangadmin"></div>
    <hr class="sidebar-divider">
</ul>
