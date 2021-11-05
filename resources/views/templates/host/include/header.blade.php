<div class="float-end">
    <li class="nav-item dropdown w-100 list-style">
        <a id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#" class="nav-link dropdown-toggle text-dark ps-4">Host</a>
        <ul class="dropdown-menu w-100 list-style" aria-labelledby="navbarDropdown2">

            <li><a href="#" class="dropdown-item text-dark ps-4 p-2 ">Profile</a></li>
            <hr>
            <li class="btn-logout" >
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a type="button" class="dropdown-item text-dark ps-4 p-2">Logout</a>
                </form>
            </li>

        </ul>
    </li>

</div>
