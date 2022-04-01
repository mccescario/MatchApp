@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Profile</h3>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <form action="{{ route('profilemanagement.update',Auth::user()->id) }}" method="PATCH" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body text-center shadow">
                        <img class="rounded-circle mb-3 mt-4" src="{{asset('/images/'.Auth::user()->profile_photo_path ) }}" width="160" height="160">
                        <div class="mb-3">
                            <label for="">
                                <input
                                    type="file"
                                    name="img_path"
                                    class="hidden"
                                    style="width: 250px;">
                            </label>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="submit">Change Photo</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Password Change</h6>
                </div>
                <div class="card-body">

                    <div class="small">
                        <form class="form-inline">
                        <div class="row">
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label" for="username"><strong>Password</strong></label>
                                    <input class="form-control" type="password" id="username" placeholder="*****************" name="password"></div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label" for="email"><strong>Confirm Password</strong></label>
                                    <input class="form-control" type="password" id="email" placeholder="*****************" name="confirm_password"></div>
                            </div>
                        </div>

                            <button class="btn btn-primary btn-sm" type="submit">Change Password</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Account Credentials</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profilemanagement.update',Auth::user()->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="username"><strong>Username</strong></label>
                                            <input class="form-control" type="text" id="username" placeholder="{{ Auth::user()->username }}" value="{{Auth::user()->username}}" name="username"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email"><strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}" name="email"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="firstname"><strong>First Name</strong></label>
                                            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="{{ Auth::user()->firstname }}" value="{{ Auth::user()->firstname }}"></div>

                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="lastname"><strong>Last Name</strong></label>
                                            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="{{ Auth::user()->lastname }}" value="{{ Auth::user()->lastname }}"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="course"><strong>Course</strong><br></label>
                                            <select class="form-select" id="course" name="course">
                                                <option value="0" selected>Select Course</option>
                                                <option value="BSITWMA" {{ strtolower(Auth::user()->course) == strtolower('BSITWMA') ? 'selected' : '' }}>BSITWMA</option>
                                                <option value="BSITSMBA" {{ strtolower(Auth::user()->course) == strtolower('BSITSMBA') ? 'selected' : '' }}>BSITSMBA</option>
                                                <option value="BSITDA" {{ strtolower(Auth::user()->course) == strtolower('BSITDA') ? 'selected' : '' }}>BSITDA</option>
                                                <option value="BSITAGD" {{ strtolower(Auth::user()->course) == strtolower('BSITAGD') ? 'selected' : '' }}>BSITAGD</option>
                                                <option value="BSCSDS" {{ strtolower(Auth::user()->course) == strtolower('BSCSDS') ? 'selected' : '' }}>BSCSDS</option>
                                                <option value="BSCSSE" {{ strtolower(Auth::user()->course) == strtolower('BSCSSE') ? 'selected' : '' }}>BSCSSE</option>
                                                <option value="BSMADA" {{ strtolower(Auth::user()->course) == strtolower('BSMADA') ? 'selected' : '' }}>BSMADA</option>
                                                <option value="BSCE" {{ strtolower(Auth::user()->course) == strtolower('BSCE') ? 'selected' : '' }}>BSCE</option>
                                                <option value="BSEE" {{ strtolower(Auth::user()->course) == strtolower('BSEE') ? 'selected' : '' }}>BSEE</option>
                                                <option value="BSECE" {{ strtolower(Auth::user()->course) == strtolower('BSECE') ? 'selected' : '' }}>BSECE</option>
                                                <option value="BSCPE" {{ strtolower(Auth::user()->course) == strtolower('BSCPE') ? 'selected' : '' }}>BSCPE</option>
                                                <option value="BSME" {{ strtolower(Auth::user()->course) == strtolower('BSME') ? 'selected' : '' }}>BSME</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">

                                            <label class="form-label" for="birthdate"><strong>Birth Date</strong><br></label>

                                            <input class="form-control" type="date" id="birthdate" placeholder="{{ Auth::user()->birthdate }}" value="{{ Auth::user()->birthdate }}" name="birthdate"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="student_number"><strong>Student Number</strong></label>
                                            <input class="form-control" type="text" id="student_number" name="student_number" placeholder="{{ Auth::user()->student_number }}" value="{{ Auth::user()->student_number }}"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Changes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
