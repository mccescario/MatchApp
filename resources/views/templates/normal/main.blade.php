<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{--
    <link rel="stylesheet" href="{{url('fonts/ionicons.min.css');}}"> --}}
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css');}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css');}}">
    <link rel="stylesheet" href="{{ url('fonts/font-awesome.min.css');}}">
    <link rel="stylesheet" href="{{ url('fonts/fontawesome5-overrides.min.css');}}">
    <link rel="stylesheet" href="{{ url('css/Bold-BS4-Header-with-HTML5-Video-Background.css');}}">
    {{--
    <link rel="stylesheet" href="{{ url('css/Community-ChatComments.css');}}"> --}}
    <link rel="stylesheet" href="{{ url('css/Form-Select---Full-Date---Month-Day-Year.css');}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ url('css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css');}}">
    <link rel="stylesheet" href="{{ url('css/newsfeed-post.css');}}">
    {{--
    <link rel="stylesheet" href="{{ url('css/calendar.css');}}" /> --}}
    <script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>

    <link href="/bracket/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bracket/assets/css/bracketlyStyle.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        @include('templates.normal.include.sidebar')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('templates.normal.include.header')

                @yield('content')
            </div>
            {{-- @include('templates.normal.include.footer') --}}
        </div>

    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js">
    </script>

    <script src="/bracket/assets/js/jquery-ui.min.js"></script>
    <script src="/bracket/assets/js/jquery-multisortable.min.js"></script>
    <script src="/bracket/assets/js/bracketly.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="{{ asset('js/Date-Range-Picker.js')}}"></script>
    <script src="{{ asset('js/DateRangePicker.js')}}"></script>
    <script src="{{ asset('js/Dynamically-Add-Remove-Table-Row.js')}}"></script>
    <script src="{{ asset('js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js')}}"></script>
    <script src="{{ asset('js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js')}}"></script>
    <script src="{{ asset('js/theme.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    @isset($olympics)
    <script>
        var olympics = @json($olympics);
        var olympic_id = null;
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
    </script>
    @endisset

</body>

</html>
