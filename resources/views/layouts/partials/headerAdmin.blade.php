<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="images/ONLY ICON.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="images/LOGO_TOKO_UTAMA_COLORED.png" alt="" height="24"> <span
                            class="logo-txt">Toko Utama</span>
                    </span>
                </a>
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="images/ONLY ICON.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="images/LOGO_TOKO_UTAMA_COLORED.png" alt="" height="24"> <span
                            class="logo-txt">Toko Utama</span>
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->profile_picture) }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->full_name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
