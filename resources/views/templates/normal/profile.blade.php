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
                <form action="{{ route('normal-imageupload') }}" method="POST" enctype="multipart/form-data">
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
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="username"><strong>Username</strong></label>
                                            <input class="form-control" type="text" id="username" placeholder="{{ Auth::user()->username }}" name="username"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email"><strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" placeholder="{{ Auth::user()->email }}" name="email"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="firstname"><strong>First Name</strong></label>
                                            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="{{ Auth::user()->firstname }}"></div>

                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="lastname"><strong>Last Name</strong></label>
                                            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="{{ Auth::user()->lastname }}"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="course"><strong>Course</strong><br></label>
                                            <select class="form-select" id="course" name="course">
                                                <option value="0" selected>Select Course</option>
                                                <option value="1">BSITWMA</option>
                                                <option value="2">BSITSMBA</option>
                                                <option value="3">BSITDA</option>
                                                <option value="4">BSITAGD</option>
                                                <option value="5">BSCSDS</option>
                                                <option value="6">BSCSSE</option>
                                                <option value="7">BSMADA</option>
                                                <option value="8">BSCE</option>
                                                <option value="9">BSEE</option>
                                                <option value="10">BSECE</option>
                                                <option value="11">BSCPE</option>
                                                <option value="12">BSME</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">

                                            <label class="form-label" for="birthdate"><strong>Birth Date</strong><br></label>

                                            <input class="form-control" type="date" id="birthdate" placeholder="{{ Auth::user()->birthdate }}" name="birthdate"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="student_number"><strong>Student Number</strong></label>
                                            <input class="form-control" type="text" id="student_number" name="student_number" placeholder="{{ Auth::user()->student_number }}"></div>
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
