<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/bracket/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bracket/assets/css/bracketlyStyle.css" rel="stylesheet">
    {{--
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:100,200,300,400,500,600&display=swap"
        rel="stylesheet"> --}}
    <script src="/bracket/documentation/assets/highlight.pack.js"></script>
    <link href="/bracket/documentation/assets/github.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <h3 class="mb-4 text-dark">{{ $tournament->tournament_name }}</h3>
        <livewire:tournament-matches-api-table :tournamentModel='$tournament->id' />
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="/bracket/assets/js/jquery-ui.min.js"></script>
    <script src="/bracket/assets/js/jquery-multisortable.min.js"></script>
    <script src="/bracket/assets/js/bracketly.js"></script>

</body>
</html>