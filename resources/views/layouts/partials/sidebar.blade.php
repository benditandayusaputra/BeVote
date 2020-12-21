<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="in">
                <li class="sidebar-item" id="menu-dashboard"> 
                    <a class="sidebar-link active" href="{{ route('admin.dashboard.index') }}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Menu</span></li>

                <li class="sidebar-item" id="menu-osis"> 
                    <a class="sidebar-link" href="{{ route('admin.aspiration.index') }}" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i><span class="hide-menu">Osis</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu-candidate"> 
                    <a class="sidebar-link" href="{{ route('admin.candidate.index') }}" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i><span class="hide-menu">Calon</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu-choice"> 
                    <a class="sidebar-link" href="{{ route('admin.choice.index') }}" aria-expanded="false">
                        <i data-feather="edit-3" class="feather-icon"></i><span class="hide-menu">Pemilihan</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu-aspiration"> 
                    <a class="sidebar-link" href="{{ route('admin.aspiration.index') }}" aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i><span class="hide-menu">Aspirasi</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu-rating"> 
                    <a class="sidebar-link" href="{{ route('admin.rating.index') }}" aria-expanded="false">
                        <i data-feather="star" class="feather-icon"></i><span class="hide-menu">Penilaian</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu-users"> 
                    <a class="sidebar-link" href="{{ route('admin.user.index') }}" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i><span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu-config"> 
                    <a class="sidebar-link" href="{{ route('admin.config.index') }}" aria-expanded="false">
                        <i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Konfigurasi</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>