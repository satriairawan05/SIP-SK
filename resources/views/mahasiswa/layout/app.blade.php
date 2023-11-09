@include('mahasiswa.partials.header')
<div id="wrapper">
    <!-- Sidebar -->
    @include('mahasiswa.partials.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            @include('mahasiswa.partials.topbar')
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
        @include('mahasiswa.partials.watermark')
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('mahasiswa.partials.footer')
