<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: #1b1b1b;">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><img src="./images/matchapp-icon.png" style="height: 45px;transform: rotate(14deg);width: 45px;"></div>
            <div class="sidebar-brand-text mx-3"><span>Matchapp</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link active" href="{{ route('player-dashboard') }}"><i class="fas fa-tachometer-alt" style="width: 20px;"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('profile', Auth::user()->id) }}"><i class="fas fa-user-alt" style="width: 20px;"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('team', Auth::user()->id ) }}"><i class="fas fa-users" style="width: 20px;"></i><span style="color: rgba(255, 255, 255, 0.8);">Teams</span></a></li>
            <li class="nav-item"><a class="nav-link" href="tournaments.html"><i class="fas fa-trophy" style="width: 20px;"></i><span>Tournaments</span></a></li>
            <li class="nav-item"><a class="nav-link" href="stream.html"><i class="fab fa-twitch" style="width: 20px;"></i><span>Livestream</span></a></li>
            <li class="nav-item"><a class="nav-link" href="livestream.html"><i class="fas fa-handshake" style="width: 20px;"></i><span>Team Matchmaking</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>




<!--<nav id="sidebar" class="navbar_user navbar-expand nav_color d-flex flex-column align-item-start active-nav">
    <a href="/host-dashboard" class="navbar-brand nav_color mt-5  pb-3 ">
        <div class="display-5 font-weight-bold ps-3">
            MatchApp
        </div>
    </a>

    <hr class="border-g">

    <ul class="navbar-nav d-flex flex-column mt-3 w-100">

        <li class="nav-item w-100">
            <a href="{{ route('dashboard') }}" class="nav-link nav_color ps-4">Dashboard</a>
        </li>

        <li class="nav-item w-100">
            <a href="{{ route('profile', Auth::user()->id) }}" class="nav-link nav_color ps-4">Profile</a>
        </li>

        <li class="nav-item dropdown w-100">
            <a id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"  class="nav-link dropdown-toggle nav_color ps-4">Tournament</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown1">

                <li><a href="#" class="dropdown-item ps-4 p-2">Schedule</a></li>
                <li><a href="#" class="dropdown-item ps-4 p-2">Brackets</a></li>


            </ul>
        </li>

        <li class="nav-item dropdown w-100">
            <a id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"  class="nav-link dropdown-toggle nav_color ps-4">Teams</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown1">

                <li><a href="{{ route('team-manage', Auth::user()->id ) }}" class="dropdown-item ps-4 p-2">Manage Team</a></li>
                <li><a href="#" class="dropdown-item ps-4 p-2">Team Matchmaking</a></li>


            </ul>
        </li>



    </ul>

</nav>
-->
