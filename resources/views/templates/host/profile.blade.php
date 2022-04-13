@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{asset('/images/'.Auth::user()->profile_photo_path) }}" width="160" height="160">
                    <div class="mb-3">
                        <input
                        type="file"
                        name="img_path"
                        class="custom-file-input"
                        >
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
                                        <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label>
                                            <input class="form-control" type="text" id="username" placeholder="{{ Auth::user()->username}}" name="username"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" placeholder="{{ Auth::user()->email}}" name="email"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label>
                                            <input class="form-control" type="text" id="first_name" placeholder="{{ Auth::user()->firstname}}" name="first_name"></div>
                                        <div class="mb-3"><label class="form-label" for="password"><strong>Password</strong></label>
                                            <input class="form-control" type="password" id="password" placeholder="*********" name="password"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label>
                                            <input class="form-control" type="text" id="last_name" placeholder="{{ Auth::user()->lastname}}" name="last_name"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" style="margin-top: 20px;">Save Changes</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Personal Information</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label>
                                    <input class="form-control" type="text" id="address" placeholder="{{ Auth::user()->address}}" name="address"></div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="bday"><strong>Birthdate</strong><br></label>
                                            <input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="bday" placeholder="{{ Auth::user()->birthdate}}" name="course"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="contact_number"><strong>Contact Number</strong></label>
                                            <input class="form-control" type="text" id="cont_num" placeholder="{{ Auth::user()->contact_number}}" name="contact_number"></div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" style="margin-top: 20px;">Save&nbsp;Changes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
