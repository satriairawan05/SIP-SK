<nav class="navbar navbar-expand navbar-light bg-success topbar static-top mb-4">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <div class="nav-item d-flex mt-4 flex-col text-white">
            <i class="fas fa-clock" style="margin-top: 3px;"></i>&nbsp;<div id="waktu"></div>
        </div>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if (auth()->guard('admin')->check())
                    <img class="img-profile rounded-circle" src="{{ asset('ruang-admin/img/profile.png') }}"
                        style="max-width: 60px">
                @else
                    @if (auth()->guard('mahasiswa')->user()->mhs_jk === 'Laki-Laki')
                        <img class="img-profile rounded-circle" src="{{ asset('ruang-admin/img/boy.png') }}"
                            style="max-width: 60px">
                    @else
                        <img class="img-profile rounded-circle" src="{{ asset('ruang-admin/img/girl.png') }}"
                            style="max-width: 60px">
                    @endif
                @endif
                <span
                    class="d-none d-lg-inline small ml-2 text-white">{{ auth()->guard('admin')->check()? auth()->user()->name: auth()->guard('mahasiswa')->user()->mhs_nama }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right animated--grow-in shadow" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
