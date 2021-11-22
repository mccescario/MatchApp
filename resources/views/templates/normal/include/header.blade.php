<div class="float-end">
    <li class="nav-item dropdown w-100 list-style">
        <a id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#" class="nav-link dropdown-toggle ps-4 rounded btn-bg-inverse" >Welcome, {{ Auth::user()->name }}</a>
        <ul class="dropdown-menu w-50 list-style " aria-labelledby="navbarDropdown2">



            <li class="btn-logout float-right" >
                <form method="POST" action="{{ route('logout') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="dropdown-item text-dark ps-4 p-2">Logout</button>
                </form>
            </li>

        </ul>
    </li>

</div>
