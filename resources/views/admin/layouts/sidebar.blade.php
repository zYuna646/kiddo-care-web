<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/front/img/favicon.png') }}" width="50">
                    <h4 class="mb-0 px-2 fw-bolder">ADMIN PANEL</h4>
                </div>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar border-top overflow-hidden" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if ($active == 'dashboard') active @endif"
                        href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Data Master</span>
                </li>
                @if (auth()->check()) {{-- Check if the user is authenticated --}}
                @if (auth()->user()->role == 'admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link @if ($active == 'KategoriArtikel') active @endif"
                            href="{{ route('KategoriArtikel') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Kategori Artikel</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if ($active == 'Artikel') active @endif"
                            href="{{ route('Artikel') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Artikel</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if ($active == 'Puskesmas') active @endif"
                            href="{{ route('Puskesmas') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Puskesmas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if ($active == 'Admin') active @endif"
                            href="{{ route('Admin') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Admin Puskesmas</span>
                        </a>
                    </li>
                @else {{-- If the user is not an admin --}}

                    <li class="sidebar-item">
                        <a class="sidebar-link @if ($active == 'Masyarakat') active @endif"
                            href="{{ route('Masyarakat') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Masyarkat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if ($active == 'Petugas') active @endif"
                            href="{{ route('Petugas') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Petugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if ($active == 'Anak') active @endif"
                            href="{{ route('Anak') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Anak</span>
                        </a>
                    </li>
                @endif
            @endif




                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Settings</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if ($active == 'account-setting') active @endif"
                        href="{{ route('account-setting') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-cog"></i>
                        </span>
                        <span class="hide-menu">Account Setting</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
