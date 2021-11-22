<div class="float-end">
    <li class="nav-item dropdown w-100 list-style">
        <a id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#" class="shadow nav-link dropdown-toggle ps-4 rounded btn-bg-inverse" >{{ Auth::user()->name }}</a>
        <ul class="dropdown-menu w-100 list-style shadow" aria-labelledby="navbarDropdown2">

            <li><a href="#" class=" dropdown-item text-dark ps-4 p-2 ">Profile</a></li>
            <hr>
            <li class="btn-logout " >
                <form method="POST" action="{{ route('logout') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="dropdown-item text-dark ps-4 p-2">Logout</button>
                </form>
            </li>

        </ul>
    </li>

</div>
