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

                    {{-- RCR --}}
                    <a class="nav-link {{ Route::is('rcr.*') ? 'active' : '' }}" href="{{ route('rcr.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-toolbox"></i></div>
                        RCR
                    </a>

                    {{-- Notes --}}
                    <a class="nav-link {{ Route::is('notes.*') ? 'active' : '' }}" href="{{ route('notes.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-message"></i></div>
                        Notes
                    </a>

                    {{-- Performance --}}
                    <a class="nav-link {{ Route::is('getPerformance') ? 'active' : '' }}"
                        href="{{ route('getPerformance') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard"></i></div>
                        Performance
                    </a>

                    {{-- Settings --}}
                    {{-- <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                        Settings
                    </a> --}}
                @elseif (Auth::user()->role == '1')
                    {{-- Dashboard --}}
                    <a class="nav-link {{ Route::is('Agentdashboard') ? 'active' : '' }}"
                        href="{{ route('Agentdashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

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

                    {{-- RCR --}}
                    <a class="nav-link {{ Route::is('showRcr') ? 'active' : '' }}" href="{{ route('showRcr') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-toolbox"></i></div>
                        RCR
                    </a>

                    {{-- Notes --}}
                    <a class="nav-link {{ Route::is('showNotes') ? 'active' : '' }}" href="{{ route('showNotes') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-message"></i></div>
                        Notes
                    </a>
                @else
                    {{-- Dashboard --}}
                    <a class="nav-link {{ Route::is('QAdashboard') ? 'active' : '' }}"
                        href="{{ route('QAdashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    {{-- Performance --}}
                    <a class="nav-link {{ Route::is('performance.*') ? 'active' : '' }}"
                        href="{{ route('performance.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard"></i></div>
                        Performance
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
