        <header class="masthead" style="background-image: url('images/intro-bg.jpg')">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h1 class="brand-heading" style="color: var(--bs-white);">MATCHAPP</h1>
                            <p class="intro-text" style="color: var(--bs-white);">A Sports and eSports Tournament Management App.</p>
                            <a class="btn btn-link btn-circle" role="button" href="#MatchApp">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="text-center content-section" id="MatchApp" style="background: #000000;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!--<a href="{{route('login')}}"><button class="button" type="button" ><span>SIGN IN</span></button></a>-->
                        <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#signin" data-hover="PROCEED">
                            <span>SIGN IN</span>
                        </button>

                        <!--<a href="{{route('register')}}"><button class="button" type="button" ><span>DON'T HAVE AN ACCOUNT?</span></button></a>-->
                        <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#register" data-hover="REGISTER">
                            <span>DON'T HAVE AN ACCOUNT?</span>
                        </button>

                        <p style="margin: 40px;">&nbsp;MatchApp is a tournament management app specialized for sports and eSports available through web and mobile platform with key features such as tournament hosting, real-time management, livestreaming, and team matchmaking.</p>
                    </div>
                </div>
            </div>
        </section>

        <!--Login Modal-->
        <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl " >
              <div class="modal-content" >
                <div class="modal-body">
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-flex" style="">
                            <img src="{{ asset('images/matchapp-icon.png') }}" style="height: 300px;width: 300px;margin: 100px;margin-top: 170px;"></div>
                        <div class="col-lg-7">
                            <div class="p-5 ms-10%">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="height: 50px;">Login</h4>
                                </div>
                                <form class="user">
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 35px;">
                                            <!--<input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Email" name="email"></div>-->

                                            <x-jet-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required autofocus placeholder="{{ __('Email') }}" />
                                        </div>

                                        <div class="col-sm-6" style="margin-top: 35px;">
                                            <!--<input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Password" name="password"></div>-->

                                            <x-jet-input id="password" class="form-control form-control-user" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}" />

                                        </div>

                                    </div>
                                    <div class="mb-3"></div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #1b1b1b;margin-top: 100px;">Login</button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="tournaments.html">Don't have an account? Register</a></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary float-end" style="background: #1b1b1b;" data-bs-dismiss="modal">Close</button>
                </form>
                </div>

              </div>
            </div>
          </div>


          <!--Registration Modal-->
          <div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-flex"><img src="{{ asset('images/matchapp-icon.png') }}" style="height: 300px;width: 300px;margin: 115px;margin-top: 170px;"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="height: 50px;">Create an Account!</h4>
                                </div>
                                <form class="user" method="POST" action="{{ route('register') }}">

                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 35px;">
                                            <input class="form-control form-control-user" type="text" id="firstname" placeholder="First Name" name="firstname" >
                                            <input class="form-control form-control-user" type="email" id="email" placeholder="Email" name="email" style="margin-top: 20px;"></div>
                                        <div class="col-sm-6" style="margin-top: 35px;">
                                            <input class="form-control form-control-user" type="text" id="lastname" placeholder="Last Name" name="lastname" >
                                            <input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" style="margin-top: 20px;"></div>
                                            <hr style="margin-top: 15px;">
                                        <div class="col-sm-6" style="margin-top: 15px;">
                                            <select class="form-select form-control-user" type="text" id="role" placeholder="Role" name="role" >
                                                <option value="0" selected>Select a Role</option>
                                                <option value="2">Host</option>
                                                <option value="3">Player</option>
                                            </select>
                                            <select class="form-select form-control-user" type="text" id="gender" placeholder="Gender" name="gender" style="margin-top: 20px;">
                                                <option value="0" selected>Select a Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6" style="margin-top: 15px;">
                                            <input class="form-control form-control-user" type="date" id="bday" placeholder="Birthdate" name="birthdate">
                                            <input class="form-control form-control-user" type="text" id="contnum" placeholder="Contact Number" name="contact_number" style="margin-top: 20px;"></div>
                                        <div class="col-sm-6" style="margin-top: 35px;">
                                            <select class="form-select form-control-user" type="text" id="course" placeholder="Course/Program" name="course">
                                                <option value="0">Select a Course</option>
                                                <option value="1">BSITWMA</option>
                                                <option value="2">BSITSMBA</option>
                                                <option value="3">BSITDA</option>
                                                <option value="4">BSITGA</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6" style="margin-top: 35px;">
                                            <input class="form-control form-control-user" type="text" id="student_number" placeholder="Student Number" name="student_number">
                                        </div>

                                    </div>
                                    <div class="mb-3"></div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #1b1b1b;margin-top: 20px;">Register Account</button>
                                    <hr>
                                </form>

                                <div class="text-center"><a class="small" href="tournaments.html">Already have an account? Login</a></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary float-end" style="background: #1b1b1b;" data-bs-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>

