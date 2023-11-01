@include('backend.partials.header')
<div id="wrapper">
    <!-- Sidebar -->
    @include('backend.partials.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-success topbar static-top mb-4">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item text-white d-flex mt-4">
                        <i class="fas fa-clock" style="margin-top: 3px;"></i>&nbsp;<div id="waktu"></div>
                    </div>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (auth()->guard('admin')->check())
                            <img class="img-profile rounded-circle" src="{{ asset('ruang-admin/img/profile.png') }}" style="max-width: 60px">
                            @else
                                @if (auth()->guard('mahasiswa')->user()->mhs_jk === 'Laki-Laki')
                                <img class="img-profile rounded-circle" src="{{ asset('ruang-admin/img/boy.png') }}" style="max-width: 60px">
                                @else
                                <img class="img-profile rounded-circle" src="{{ asset('ruang-admin/img/girl.png') }}" style="max-width: 60px">
                                @endif
                            @endif
                            <span class="d-none d-lg-inline small ml-2 text-white">{{ auth()->guard('admin')->check()? auth()->user()->name: auth()->guard('mahasiswa')->user()->mhs_nama }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated--grow-in shadow" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                <!--Row-->
                @yield('app')
                <!--Row-->

                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to logout?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ auth()->guard('admin')->check() ? route('user.logout') : route('mahasiswa.logout') }}" method="post">
                                    @csrf
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!---Container Fluid-->
        </div>
        @include('backend.partials.watermark')
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('backend.partials.footer')
