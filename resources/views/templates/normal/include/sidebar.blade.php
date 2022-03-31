<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: #1b1b1b;">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><img src="/images/matchapp-icon.png" style="height: 45px;transform: rotate(14deg);width: 45px;"></div>
            <div class="sidebar-brand-text mx-3"><span>Matchapp</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link active" href="{{ route('player-dashboard') }}"><i class="fas fa-tachometer-alt" style="width: 20px;"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('profile', Auth::user()->id) }}"><i class="fas fa-user-alt" style="width: 20px;"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('team', Auth::user()->id ) }}"><i class="fas fa-users" style="width: 20px;"></i><span style="color: rgba(255, 255, 255, 0.8);">Teams</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('invites', Auth::user()->id ) }}"><i class="fas fa-users" style="width: 20px;"></i><span style="color: rgba(255, 255, 255, 0.8);">Team Invites</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route("player-tournament") }}"><i class="fas fa-trophy" style="width: 20px;"></i><span>Tournaments</span></a></li>


        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>



