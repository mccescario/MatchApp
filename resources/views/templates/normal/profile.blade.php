@extends('templates.normal.main')

@section('content')

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



@endsection
