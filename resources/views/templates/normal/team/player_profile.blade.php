@extends('templates.normal.main')

@section('content')

<h3 class="text-dark mb-4" style="color: #092d13 !important;">Profiles</h3>

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
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                        <div class="mb-3"><button class="btn btn-bg btn-sm shadow" type="button" >Change Photo</button></div>
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
                                            <label class="form-label" for="email"><strong>Team Name :</strong>
                                            </label><input class="form-control disabled" readonly type="email" id="email" placeholder="@if (Auth::user()->sport_type == 1) @if (Auth::user()->sport == 1)Basketball  @elseif(Auth::user()->sport == 2) Volleyball @endif @elseif(Auth::user()->sport_type == 2) @if (Auth::user()->esport == 1)League of Legends (LoL) @elseif(Auth::user()->esport == 2)Defense of the Ancients 2 (DotA 2)  @endif @endif" name="email">
                                        </div>
                                    </div>


                                </div>


                                <div class="row" x-show="">
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="ign"><strong>IGN :</strong></label>
                                            <input class="form-control" type="text"  id="" name="" placeholder="{{ $profile->ign }}">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for=""><strong>Role/Position :</strong></label>
                                            <input class="form-control" type="text"  id="" name="" placeholder="{{ $profile->position }}">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for=""><strong>Division :</strong></label>
                                            <input class="form-control" type="text"  id="" name="" placeholder="{{ $profile->rank }}">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="address"><strong>Win Rate :</strong></label>
                                            <input class="form-control" type="text"  id="" name="" placeholder="{{ $profile->win_rate }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



@endsection
