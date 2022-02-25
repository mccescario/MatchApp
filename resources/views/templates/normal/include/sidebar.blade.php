<nav id="sidebar" class="navbar_user navbar-expand nav_color d-flex flex-column align-item-start active-nav">
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
