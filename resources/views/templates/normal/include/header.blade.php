<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i></button>
        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item dropdown d-sm-none no-arrow">
                <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                    <i class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="me-auto navbar-search w-100">
                        <div class="input-group">
                            <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0" type="button">
                                    <i class="fas fa-search"></i></button></div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1"> <!--Alerts Notif-->
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <span class="badge bg-danger badge-counter"></span><!--notif number-->
                        <i class="fas fa-bell fa-fw txt-purple" ></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                        <h6 class="dropdown-header bg-dark border-0">alerts center</h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="me-3">
                                <div class="bg-primary icon-circle">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div><span class="small text-gray-500">December 12, 2019</span>
                                <p>A new monthly report is ready to download!</p>
                            </div>
                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1"> <!--Messages Notif-->
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <span class="badge bg-danger badge-counter"></span><!--Messages number-->
                        <i class="fas fa-envelope fa-fw txt-purple"></i></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                        <h6 class="dropdown-header bg-dark border-0">alerts center</h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image me-3">
                                <img class="rounded-circle" src="{{asset('/images/'.Auth::user()->profile_photo_path) }}">
                                <div class="bg-success status-indicator"></div>
                            </div>
                            <div class="fw-bold">
                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                            </div>
                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </div>
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <span class="d-none d-lg-inline me-2 small" style="color:#428062;">{{ Auth::user()->firstname }}</span>
                        <img class="border rounded-circle img-profile" src="{{asset('/images/'.Auth::user()->profile_photo_path) }}"></a>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>


                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

