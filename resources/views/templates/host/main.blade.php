
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','MatchApp - Host') </title>

    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css');}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css');}}">
    <link rel="stylesheet" href="{{ url('fonts/font-awesome.min.css');}}">
    <link rel="stylesheet" href="{{ url('fonts/fontawesome5-overrides.min.css');}}">
    <link rel="stylesheet" href="{{ url('css/Bold-BS4-Header-with-HTML5-Video-Background.css');}}">
    <link rel="stylesheet" href="{{ url('css/Community-ChatComments.css');}}">
    <link rel="stylesheet" href="{{ url('css/Form-Select---Full-Date---Month-Day-Year.css');}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ url('css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css');}}">
    <link rel="stylesheet" href="{{ url('css/newsfeed-post.css');}}">
    <link rel="stylesheet" href="{{ url('css/calendar.css');}}" />
    <script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>

    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{url('css/style.css'); }">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    -->
</head>
<body id="page-top">
    <div id="wrapper">
         @include('templates.host.include.sidebar')

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
    <!--<section class="p-4 my-container active-cont mb-5">-->
        @include('templates.host.include.header')

         @yield('content')
        </div>
        @include('templates.host.include.footer')
    </div>
    <!--</section>-->
    </div>



    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="{{ asset('js/Date-Range-Picker.js')}}"></script>
    <script src="{{ asset('js/DateRangePicker.js')}}"></script>
    <script src="{{ asset('js/Dynamically-Add-Remove-Table-Row.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js')}}"></script>
    <script src="{{ asset('js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js')}}"></script>
    <script src="{{ asset('js/theme.js')}}"></script>
    <script src="{{ asset('js/calendar.js')}}"></script>


    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{ mix('js/app.js') }" defer></script>
    <script>
        var menu_btn = document.querySelector("#menu-btn")
        var sidebar = document.querySelector("#sidebar")
        var container = document.querySelector(".my-container")
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav")
            container.classList.toggle("active-cont")
        })
    </script>
    <script>
        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
      </script>
    -->
</body>
</html>
