<header class="topbar bg-white" data-navbarbg="skin6" wire:ignore>
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <div class="navbar-brand">
                <a href="javascript:void(0)">
                    <b class="logo-icon">
                        <img src="{{ asset('media/bendVote.png') }}" alt="homepage" width="35px" class="dark-logo" />
                    </b>
                    <span class="logo-text">
                        <h2 class="dark-logo text-dark" style="position: relative !important; top: 10px !important;">BEvote</h2>
                    </span>
                </a>
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('admin.config.index') }}" id="navbarDropdown" role="button">
                        <i data-feather="settings" class="svg-icon"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if ( session('photo') != null )
                            <img src="{{ Storage::disk('public')->get(session('photo')) }}" alt="user" class="rounded-circle" width="40">
                        @else 
                            <img src="{{ asset('src') }}/assets/images/media/icon-user-man.png" alt="user" class="rounded-circle" width="40">
                        @endif
                        <span class="ml-2 d-none d-lg-inline-block">
                            <span>Hello,</span> 
                            <span class="text-dark">{{ session('name') }}</span> 
                            <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                            <i data-feather="user" class="svg-icon mr-2 ml-1"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">
                            <i data-feather="power" class="svg-icon mr-2 ml-1"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>