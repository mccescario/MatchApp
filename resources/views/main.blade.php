<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','MatchApp') </title>
    <link rel="shortcut icon" href="{{ url('images/matchapp-icon.png'); }}">
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrapp.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="{{url('fonts/font-awesome.min.css');}}">
    <link rel="stylesheet" href="{{url('css/Button-Change-Text-on-Hover.css');}}">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">

    @include('templates.landing.nav_landing')
    @include('templates.landing.body_landing')
    @include('templates.landing.footer_landing')

    <div class="map-clean"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!--<script src="{{ asset('bootstrap/js/bootstrapp.min.js')}}"></script>-->
    <script>
        var olympics = @json($olympics);
        var olympic_id = null;
        $(".player-fields").hide();
        $("#select-category").on("change",function(){
            olympic_id = this.value;
            let games = olympics.filter(x=> x.id == olympic_id);
            var select_game = $('.select-game');
            select_game.find('option').not(':first').remove();
            select_game.val("").change();
            if(games[0].olympic_category_name == 'Esport'){
                var esports = games[0];
                esports.esport_categories.forEach(function (esport) {
                    select_game.append($('<option>', {
                        value: esport.id,
                        text: esport.esport_category_name
                    }));
                });
            } else if(games[0].olympic_category_name == 'Sport'){
                var sports = games[0];
                sports.sport_categories.forEach(function (sport) {
                    select_game.append($('<option>', {
                        value: sport.id,
                        text: sport.sport_category_name
                    }));
                });
            }
            // console.log(game[0].olympic_category_name);
        });

        $('.select-game').on("change",function(){
            let game_id = this.value;
            let games = olympics.filter(x=> x.id == olympic_id);
            var select_role = $(".select-game-role");
            select_role.find('option').not(':first').remove();
            select_role.val("").change();
            // let roles = games[0].esport_categories.filter(game => game.id == game_id);
            if(games[0].olympic_category_name.toLowerCase() == 'esport'){
                let roles = games[0].esport_categories.filter(game => game.id == game_id)[0];
                if(typeof roles !== 'undefined'){
                    roles.esport_roles.forEach(function (role) {
                        select_role.append($('<option>', {
                            value: role.id,
                            text: role.esport_role_name
                        }));
                    });
                }

            } else if(games[0].olympic_category_name.toLowerCase() == 'sport'){
                let roles = games[0].sport_categories.filter(game => game.id == game_id)[0];
                if(typeof roles !== 'undefined'){
                    roles.sport_positions.forEach(function (position) {
                        select_role.append($('<option>', {
                            value: position.id,
                            text: position.sport_position_name
                        }));
                    });
                }
            }
        });

        $(".select-role").on("change",function(){
            let role = this.value;
            if(role === "2") {
                $(".player-fields").hide();
            } else if(role === "3"){
                $(".player-fields").show();
            }
        });

          var mainNav = document.querySelector('#mainNav');

            if (mainNav) {

                var navbarCollapse = mainNav.querySelector('.navbar-collapse');

                if (navbarCollapse) {

                    var collapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: false
                    });

                    var navbarItems = navbarCollapse.querySelectorAll('a');

                    // Closes responsive menu when a scroll trigger link is clicked
                    for (var item of navbarItems) {
                    item.addEventListener('click', function (event) {
                        collapse.hide();
                    });
                    }
                }

                // Collapse Navbar
                var collapseNavbar = function() {

                    var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;

                    if (scrollTop > 100) {
                    mainNav.classList.add("navbar-shrink");
                    } else {
                    mainNav.classList.remove("navbar-shrink");
                    }
                };
                // Collapse now if page is not at top
                collapseNavbar();
                // Collapse the navbar when page is scrolled
                document.addEventListener("scroll", collapseNavbar);
            }


    </script>
</body>

</html>


{{--
<x-guest-layout class="color-green">

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if (Route::has('login'))

                    @auth

                        <a href="{{ url('/dashboard') }}" class=" btn text-sm dark:text-gray-500 ">Already Logged-in</a>
                    @else

                        <x-jet-button>
                            <a href="{{ route('login') }}" class="text-sm dark:text-gray-500 ">Log in</a>
                        </x-jet-button>

                        @if (Route::has('register'))
                        <x-jet-button>
                            <a href="{{ route('register') }}" class="text-sm text-green-700 dark:text-gray-500">Register</a>
                        </x-jet-button>

                        @endif


                    <body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
                        <nav class="navbar navbar-light navbar-expand-md fixed-top" id="mainNav">
                            <div class="container"><a class="navbar-brand" href="#">
                              <img src="assets/img/matchapp-icon.png" style="height: 28px;width: 28px;">&nbsp;MatchAPP</a>
                              <button data-bs-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu">
                                <i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item nav-link"><a class="nav-link active" href="#about">Sign in</a></li>
                                        <li class="nav-item nav-link"></li>
                                        <li class="nav-item nav-link"></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <header class="masthead" style="background-image:url('assets/img/intro-bg.jpg');">
                            <div class="intro-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <h1 class="brand-heading" style="color: var(--bs-white);">MaTCHAPP</h1>
                                            <p class="intro-text" style="color: var(--bs-white);">A Sports and eSports Tournament Management App.</p><a class="btn btn-link btn-circle" role="button" href="#about"><i class="fa fa-angle-double-down animated"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <section class="text-center content-section" id="about" style="background: #000000;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <h2></h2>
                                        <button class="button" type="button" data-hover="PROCEED"><span>SIGN IN</span></button>
                                        <button class="button" type="button" data-hover="REGISTER"><span>DON'T HAVE AN ACCOUNT?</span></button>
                                        <p style="margin: 40px;">&nbsp;MatchApp is a tournament management app specialized for sports and eSports available through web and mobile platform with key features such as tournament hosting, real-time management, livestreaming, and team matchmaking.</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="map-clean"></div>
                        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                        <script src="assets/js/grayscale.js"></script>
                    </body>
                    @endauth

            @endif


</x-guest-layout>
--}}
