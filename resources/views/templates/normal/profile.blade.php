@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{asset('/images/profile_images/'.Auth::user()->profile_photo_path ) }}" width="160" height="160">
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
                    <h4 class="small fw-bold"><span class="float-end"></span>
                        <form class="form-inline">
                            <div class="form-group">
                                <label>eSports</label>
                                <select  class="form-control" >
                                    <option>DOTA 2</option>
                                    <option>Valorant</option>
                                    <option>Mobile Legends</option>
                                    <option>Counter-Strike: Global Offensive</option>
                                </select>
                            </div>
                        </form></h4>
                    <h4 class="small fw-bold">
                        <form class="form-inline">
                            <div class="form-group">
                                <label >Role/Position</label>
                                <select  class="form-control" >
                                    <option>Carry</option>
                                </select>
                            </div>
                        </form></h4>
                    <h4 class="small fw-bold">
                        <form class="form-inline">
                            <div class="form-group">
                                <label >Rank</label>
                                <select  class="form-control" >
                                    <option>Immortal</option>
                                    <option>Volleyball</option>
                                    <option>Badminton</option>
                                </select>
                            </div>
                        </form></h4>
                    <h4 class="small fw-bold">
                        <div class="form-inline">
                            <div class="form-group">
                                <label >Team</label>
                                <select  class="form-control" >
                                    <option>ABAI</option>
                                </select>
                            </div>
                        </div>
                    </h4>
                        <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
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
                                        <div class="mb-3">
                                            <label class="form-label" for="password"><strong>Password</strong></label>
                                            <input class="form-control" type="text" id="password" name="password" placeholder="**********"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="lastname"><strong>Last Name</strong></label>
                                            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="{{ Auth::user()->lastname }}"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Save Changes</button></div>
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
                                        <div class="mb-3">
                                            <label class="form-label" for="course"><strong>Course</strong><br></label>
                                            <input class="form-control" type="text" id="course" placeholder="{{ Auth::user()->course }}" name="course"></div>
                                        <div class="mb-3">
                                            <label class="form-label" for="birthdate"><strong>Birth Date</strong><br></label>
                                            <input class="form-control" type="text" id="birthdate" placeholder="{{ Auth::user()->birthdate }}" name="birthdate"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="country"><strong>Student Number</strong></label>
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
