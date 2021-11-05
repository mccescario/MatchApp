<nav id="sidebar" class="navbar navbar-expand d-flex flex-column align-item-start active-nav">
    <a href="/host-dashboard" class="navbar-brand text-dark mt-5  pb-3 ">
        <div class="display-5 font-weight-bold ">
            MatchApp
        </div>
    </a>

    <hr class="border-g">

    <ul class="navbar-nav d-flex flex-column mt-3 w-100">

        <li class="nav-item w-100">
            <a href="/host-dashboard" class="nav-link text-dark ps-4">Dashboard</a>
        </li>

        <li class="nav-item dropdown w-100">
            <a id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"  class="nav-link dropdown-toggle text-dark ps-4">User</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown1">

                <li><a href="#" class="dropdown-item text-dark ps-4 p-2">Manage Players</a></li>
                <li><a href="#" class="dropdown-item text-dark ps-4 p-2">Manage Teams</a></li>

            </ul>
        </li>

        <li class="nav-item dropdown w-100">
            <a id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#" class="nav-link dropdown-toggle text-dark ps-4">Tournament</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown2">

                <li><a href="{{route('tournament.index')}}" class="dropdown-item text-dark ps-4 p-2">Manage Tournament</a></li>
                <li><a href="#" class="dropdown-item text-dark ps-4 p-2">Schedules</a></li>


            </ul>
        </li>

        <li class="nav-item w-100">
            <a href="#" class="nav-link text-dark ps-4">Standing</a>
        </li>

        <li class="nav-item w-100">
            <a href="#" class="nav-link text-dark ps-4">Stream</a>
        </li>
    </ul>

</nav>
