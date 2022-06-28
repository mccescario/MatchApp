<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-purple p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><img src="../images/matchapp-icon.png" style="height: 45px;transform: rotate(14deg);width: 45px;"></div>
            <div class="sidebar-brand-text mx-3"><span class="highlight">Matchapp</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('host-dashboard') }}">
                    <i class="fas fa-tachometer-alt {{ (request()->is('host-dashboard')) ? 'highlight' : '' }}" style="width: 20px;"></i>
                    <span class="{{ (request()->is('host-dashboard')) ? 'highlight' : '' }}"style="color: rgba(255, 255, 255, 0.8);">Dashboard</span></a></li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('host-profile', Auth::user()->id) }}">
                    <i class="fas fa-user-alt {{ (request()->is('profile/*')) ? 'highlight' : '' }}" style="width: 20px;"></i>
                    <span class="{{ (request()->is('profile/*')) ? 'highlight' : '' }}"style="color: rgba(255, 255, 255, 0.8);">Profile</span></a></li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('usermanagement') }}">
                    <i class="fas fa-user-cog {{ (request()->is('user-management')) ? 'highlight' : '' }}" style="width: 20px;"></i>
                    <span class="{{ (request()->is('user-management')) ? 'highlight' : '' }}" style="color: rgba(255, 255, 255, 0.8);">Users</span></a></li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('host-team') }}">
                    <i class="fas fa-users {{ (request()->is('team')) ? 'highlight' : '' }}" style="width: 20px;"></i>
                    <span class="{{ (request()->is('team')) ? 'highlight' : '' }}" style="color: rgba(255, 255, 255, 0.8);">Teams</span></a></li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tournament_manage') }}">
                    <i class="fas fa-trophy {{ (request()->is('tournament-management')) ? 'highlight' : '' }} {{ (request()->is('tournament*')) ? 'highlight' : '' }} {{ (request()->is('register-tournament')) ? 'highlight' : '' }}" style="width: 20px;"></i>
                    <span class="{{ (request()->is('tournament-management')) ? 'highlight' : '' }} {{ (request()->is('tournament*')) ? 'highlight' : '' }} {{ (request()->is('register-tournament')) ? 'highlight' : '' }}"style="color: rgba(255, 255, 255, 0.8);">Tournaments</span></a></li>
            

        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
