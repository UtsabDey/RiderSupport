<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                @if (Auth::user()->role == '0')
                    {{-- Dashboard --}}
                    <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    {{-- Category --}}
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="">Add Category</a>
                            <a class="nav-link" href="">View Category</a>
                        </nav>
                    </div>

                    {{-- POST --}}
                    <a class="nav-link " href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Post
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePost" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="">Add Post</a>
                            <a class="nav-link" href="">View Post</a>
                        </nav>
                    </div>

                    {{-- Users --}}
                    <a class="nav-link {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Users
                    </a>

                    {{-- Tools --}}
                    <a class="nav-link {{ Route::is('tools.*') ? 'active' : '' }}" href="{{ route('tools.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-toolbox"></i></div>
                        Tools
                    </a>

                    {{-- SOP --}}
                    <a class="nav-link {{ Route::is('sop.*') ? 'active' : '' }}" href="{{ route('sop.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-toolbox"></i></div>
                        SOP
                    </a>

                    {{-- Settings --}}
                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                        Settings
                    </a>
                @elseif (Auth::user()->role == '1')
                    {{-- Dashboard --}}
                    <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    {{-- Category --}}
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="">Add Category</a>
                            <a class="nav-link" href="">View Category</a>
                        </nav>
                    </div>

                    {{-- Tools --}}
                    <a class="nav-link {{ Route::is('showTool') ? 'active' : '' }}" href="{{ route('showTool') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-toolbox"></i></div>
                        Tools
                    </a>

                    {{-- SOP --}}
                    <a class="nav-link {{ Route::is('showSop') ? 'active' : '' }}" href="{{ route('showSop') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-toolbox"></i></div>
                        SOP
                    </a>

                    {{-- Settings --}}
                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                        Settings
                    </a>
                @else
                    {{-- Dashboard --}}
                    <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    {{-- Users --}}
                    <a class="nav-link {{ Route::is('users.*') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Users
                    </a>
                @endif

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
