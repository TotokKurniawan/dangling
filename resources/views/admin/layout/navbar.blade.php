<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-white" href="javascript:;">Pages</a>
                </li>
                <!-- Breadcrumb untuk halaman aktif -->
                <li class="breadcrumb-item text-sm text-white {{ Route::is('dashboard') ? 'active' : '' }}"
                    aria-current="page">
                    {{ Route::is('Dashboard') ? 'Dashboard' : (Route::is('Pedagang') ? 'Pedagang' : (Route::is('Profile') ? 'Profile' : (Route::is('Tambah-Pesanan') ? 'Tambah-Pesanan' : (Route::is('Mitra') ? 'Mitra' : (Route::is('Keluhan') ? 'Keluhan' : (Route::is('Pendapatan') ? 'Pendapatan' : '')))))) }}
                </li>
            </ol>
            <!-- Judul untuk halaman aktif -->
            <h6 class="font-weight-bolder text-white mb-0">
                {{ Route::is('Dashboard') ? 'Dashboard' : (Route::is('Pedagang') ? 'Pedagang' : (Route::is('Keluhan') ? 'Keluhan' : (Route::is('Tambah-Pesanan') ? 'Tambah-Pesanan' : (Route::is('Profile') ? 'Profile' : (Route::is('Mitra') ? 'Mitra' : (Route::is('Pendapatan') ? 'Pendapatan' : '')))))) }}
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav justify-content-end">
                <!-- Menu Profile -->
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ route('Profile') }}" class="nav-link text-white font-weight-bold px-2">
                        <i class="fa fa-user me-1"></i> <!-- Ikon Profile -->
                        <span class="d-sm-inline d-none">Profile</span>
                    </a>
                </li>
                <!-- Menu Logout -->
                <li class="nav-item d-flex align-items-center ms-3">
                    <a href="javascript:;" class="nav-link text-white font-weight-bold px-2">
                        <i class="fa fa-sign-out-alt me-1"></i> <!-- Ikon Logout -->
                        <span class="d-sm-inline d-none">Keluar</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
