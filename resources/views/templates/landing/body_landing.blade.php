<header class="masthead" style="background: url(&quot;{{ asset('/img/bg-pattern.png')}}&quot;), linear-gradient(#1b1b1b 0%, var(--bs-indigo) 100%);">
    <div class="container h-100">
        <div class="row d-xxl-flex justify-content-xxl-center h-100">
            <div class="col-lg-7 text-center d-xxl-flex my-auto justify-content-xxl-center" style="margin: auto;margin-left: 0px;width: 100%;">
                <div class="mx-auto header-content" style="width: auto;max-width: 100%;height: 100%;text-align: center;">
                    <h2 class="d-xxl-flex justify-content-xxl-center" style="font-size: 6rem;font-weight: bold;color: var(--bs-white);width: auto;max-width: 100%;text-align: center;">MatchApp</h2>
                    <p style="font-size: 23px;width: 100%;max-width: 100%;text-align: center;">A Sports and eSports Tournament Management App.</p>
                    <button class="btn btn-outline-warning text-center btn-xl" role="button" data-bs-toggle="modal" data-bs-target="#signin" href="#download" style="background: #1b1b1b;margin: auto;font-size: 11px;text-align: center;">SIGN IN</button>

                </div>
            </div>
        </div>
    </div>
</header>


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
                            <div class="p-5 ms-10% m-4">
                                <div class="text-center">
                                    <h4 class="text-dark m-4" style="height: 50px;">Login</h4>
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
                                <!--<div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>-->
                                <div class="text-center">
                                    <a class="link-secondary" data-bs-toggle="modal" data-bs-target="#register" style="cursor: pointer; text-decoration: none;">Don't have an account? Register</a>
                                </div>
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
                        <div class="col-lg-5 d-none d-lg-flex">
                            <img src="{{ asset('images/matchapp-icon.png') }}" style="height: 300px;width: 300px;margin: 115px;margin-top: 170px;"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="height: 50px;">Create an Account!</h4>
                                </div>
                                @if($errors->any())
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                @endif
                                <form class="user" method="POST" action="{{ route('register-user') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 35px;">
                                                <input class="form-control form-control-user" type="text" id="firstname" placeholder="First Name" name="firstname" >
                                                <input class="form-control form-control-user" type="text" id="email" placeholder="Email" name="email" style="margin-top: 20px;"></div>
                                            <div class="col-sm-6" style="margin-top: 35px;">
                                                <input class="form-control form-control-user" type="text" id="lastname" placeholder="Last Name" name="lastname" >
                                                <input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" style="margin-top: 20px;">
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 20px;">
                                                <input class="form-control form-control-user" type="date" id="bday" placeholder="Birthdate" name="birthdate">
                                                <input class="form-control form-control-user" type="text" id="contnum" placeholder="Contact Number" name="contact_number" style="margin-top: 20px;">
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 20px;">
                                                <select class="form-select form-control-user" name="gender">
                                                    <option value="" disabled selected hidden>Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <select class="form-select form-control-user select-role transition" name="role" style="margin-top: 20px;">
                                                    <option value="2" selected>Host</option>
                                                    <option value="3">Player</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row player-fields">
                                            <hr style="margin-top: 15px;">
                                            <div class="col-sm-6" style="margin-top: 15px;">
                                                <select class="form-select form-control-user" id="select-category" name="category">
                                                    <option value="" disabled selected hidden>Category</option>
                                                    @foreach ($olympics as $olympic)
                                                        <option value="{{ $olympic->id }}">{{ $olympic->olympic_category_name }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-select form-control-user select-game" name="game" style="margin-top: 20px;">
                                                    <option value="" disabled selected hidden>Game</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 15px;">
                                                <select class="form-select form-control-user" name="course">
                                                    <option value="" disabled selected hidden>Course/Program</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-select form-control-user select-game-role" name="game_role" style="margin-top: 20px;">
                                                    <option value="" disabled selected hidden>Game role</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 15px;">
                                                <input class="form-control form-control-user" type="text" id="studnum" placeholder="Student Number" name="student_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #1b1b1b;margin-top: 20px;">Register Account</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary float-end" style="background: #1b1b1b;" data-bs-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>

