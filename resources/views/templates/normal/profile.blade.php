@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Player Profile</h6>
                </div>
                <div class="card-body">
                    <div class="x-dropdown dropdown">
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">xxxxx1</a><a class="dropdown-item" role="presentation" href="#">xxxx2</a><a class="dropdown-item" role="presentation" href="#">xxxxxx3</a></div>
                    </div>
                    <h4 class="small fw-bold"><form class="form-inline">
<div class="form-group">
<label >Sports</label>
<select  class="form-control" >
<option>Basketball</option>
<option>Volleyball</option>
<option>Badminton</option>
</select>
</div>
</form></h4>
                    <h4 class="small fw-bold"><span class="float-end"></span><form class="form-inline">
<div class="form-group">
<label >eSports</label>
<select  class="form-control" >
<option>DOTA 2</option>
<option>Valorant</option>
<option>Mobile Legends</option>
<option>Counter-Strike: Global Offensive</option>
</select>
</div>
</form></h4>
                    <h4 class="small fw-bold"><form class="form-inline">
<div class="form-group">
<label >Role/Position</label>
<select  class="form-control" >
<option>Carry</option>
</select>
</div>
</form></h4>
                    <h4 class="small fw-bold"><form class="form-inline">
<div class="form-group">
<label >Rank</label>
<select  class="form-control" >
<option>Immortal</option>
<option>Volleyball</option>
<option>Badminton</option>
</select>
</div>
</form></h4>
                    <h4 class="small fw-bold"><form class="form-inline">
<div class="form-group">
<label >Team</label>
<select  class="form-control" >
<option>ABAI</option>
</select>
</div>
</form></h4><button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row mb-3 d-none">
                <div class="col">
                    <div class="card textwhite bg-primary text-white shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card textwhite bg-success text-white shadow">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="m-0">Peformance</p>
                                    <p class="m-0"><strong>65.2%</strong></p>
                                </div>
                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                            </div>
                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Account Credentials</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label><input class="form-control" type="text" id="username" placeholder="" name="username"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" placeholder="" name="email"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name" name="first_name"></div>
                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Password</strong></label><input class="form-control" type="text" id="last_name-1" name="last_name"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" name="last_name"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Changes</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Personal Information</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="city"><strong>Course</strong><br></label><input class="form-control" type="text" id="course" placeholder="" name="course"></div>
                                        <div class="mb-3"><label class="form-label" for="city"><strong>Birth Date</strong><br></label><input class="form-control" type="text" id="course-1" placeholder="" name="course"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="country"><strong>Student Number</strong></label><input class="form-control" type="text" id="student_number" name="student_number"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Changes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--

<h3 class="text-dark mb-4" style="color: #092d13 !important;">Profile</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profilemanagement.update', Auth::user()->id) }}" x-data="{ role: 3, sport_type: 0 }">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                        <div class="mb-3"><button class="btn btn-bg btn-sm shadow" type="button" >Change Photo</button></div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="color-green fw-bold m-0" style="color: #092d13 !important;">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="address"><strong>Old Password:&nbsp;</strong></label>
                                    <input type="text" id="address-1" class="form-control" placeholder="**************"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="address"><strong>New Password:&nbsp;</strong></label>
                                    <input type="text" id="address-2" class="form-control" placeholder="**************" name="address"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="address"><strong>Comfirm Password:</strong></label><input type="text" id="address-3" class="form-control" placeholder="**************" name="address"></div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <button class="btn btn-bg btn-sm shadow" type="submit">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="row">
                    <div class="col">
                        <form action="" method="post"></form>
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h5 class="color-green m-0 fw-bold" ">User Profile</h5>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name"><strong>Full Name</strong></label>
                                                <input class="form-control" type="text" id="first_name" placeholder="{{ Auth::user()->name }}" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="email"><strong>Email Address</strong>
                                                </label><input class="form-control disabled" type="email" id="email" placeholder="{{ Auth::user()->email }}" name="email" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="address"><strong>Address</strong></label>
                                        <input class="form-control" type="text" href="profile.html" id="address" name="address" placeholder="{{ Auth::user()->address }}">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="city"><strong>Contact Number</strong></label>
                                                <input class="form-control" type="text" id="city" placeholder="{{ Auth::user()->contact_number }}" name="contact_number">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="country"><strong>Civil Status</strong></label>
                                                <input class="form-control" type="text" id="country" placeholder="@if (Auth::user()->status == 1)Single @elseif(Auth::user()->status == 2)Married @endif" name="country">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h5 class="color-green m-0 fw-bold" >Player Profile</h5>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name"><strong>Sport Type :</strong></label>
                                            <input class="form-control" type="text" id="first_name" placeholder="@if (Auth::user()->sport_type == 1)Sports @elseif(Auth::user()->sport_type == 2) E-Sports @endif" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email"><strong>Sport :</strong>
                                            </label><input class="form-control disabled" type="email" id="email" placeholder="@if (Auth::user()->sport_type == 1) @if (Auth::user()->sport == 1)Basketball  @elseif(Auth::user()->sport == 2) Volleyball @endif @elseif(Auth::user()->sport_type == 2) @if (Auth::user()->esport == 1)League of Legends (LoL) @elseif(Auth::user()->esport == 2)Defense of the Ancients 2 (DotA 2)  @endif @endif" name="email">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for=""><strong>Team Name :</strong>
                                            </label><input class="form-control disabled" readonly type="" id="" placeholder="@if($team->isEmpty()) Please Join a Team @else @foreach ($team as $teams) {{$teams->team_name }} @endforeach @endif" name="">
                                        </div>
                                    </div>


                                </div>

                                @empty ($profile)
                                    <h5>Incomplete Player Profile</h5>


                                @else
                                {{$profile}}
                                @if (Auth::user()->sport_type == 1)
                                    @if ($profile->isNotEmpty())
                                    <div class="row" x-show="">
                                        @foreach ($profile as $stat)

                                        <div class="col-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="ign"><strong>Height :</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $stat->height }}" >
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for=""><strong>Weight :</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $stat->weight }}">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for=""><strong>Primary Position :</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $stat->primary_pos }}">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for=""><strong>Secondary Position :</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $stat->secondary_pos }}">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif


                                @elseif(Auth::user()->sport_type == 2)

                                    @foreach ( $profile as $estat)

                                    @endforeach
                                    <div class="row" x-show="">
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="ign"><strong>IGN :</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $estat->ign }}">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for=""><strong>Role/Position :</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $estat->position }}">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for=""><strong>Division :</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $estat->rank }}">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="address"><strong>Win Rate - Percentage:</strong></label>
                                                <input class="form-control" type="text"  id="" name="" placeholder="{{ $estat->win_rate }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @endif



                            </div>
                        </div>
                    </div>
                </div>



                <div class="m-3 row">
                    <div class="col text-center">
                        <button class="btn btn-bg p-2 px-4 shadow" type="submit"> <strong>Save Changes</strong> </button>
                    </div>

                </div>
            </div>

        </div>

    </form>


-->
@endsection
