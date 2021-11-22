@extends('templates.host.main')

@section('content')

<div>
    <a href="{{ url()->previous() }}" class="btn btn-bg mb-3"> Back</a>
</div>

<div class="card m-2 pb-3 shadow">


    <div class="card-header p-3">
        <h3 >View Tournament Details</h3>
    </div>



    <div class="container p-3">
        <div class="card shadow">
            <h5 class="card-header">Overview</h5>
            <div class="card-body p-5">
                <div class="row">

                    @if ($tournament->tournament_bracket == 1)
                    <div class="col-5">
                        <h6 class="text-start">
                            <strong>Tournament Name: </strong> &nbsp;{{ $tournament->tournament_name }}
                        </h6>
                        <h6 class="text-start">
                            <strong>Data and Time:&nbsp;</strong> {{ $tournament->tournament_date }}
                        </h6>
                        <h6 class="text-start">
                            <strong>Sport&nbsp; /&nbsp; E-Sport:</strong>
                            @if ($tournament->tournament_sport_type == 1)
                                Sports
                            @elseif ($tournament->tournament_sport_type == 2)
                                E-sports
                            @endif
                        </h6>
                        <h6 class="text-start"><strong>Type of Sport:&nbsp;</strong>

                            @if ($tournament->tournament_sport_type == 1)
                                    @if ($tournament->tournament_sport == 1)
                                        Basketball
                                    @elseif ($tournament->tournament_sport == 2)
                                        Volleyaball
                                    @endif
                                @elseif ($tournament->tournament_sport_type == 2)
                                    @if ($tournament->tournament_sport_type == 1)
                                        Lol
                                    @elseif ($tournament->tournament_sport_type == 2)
                                        Dota
                                    @endif
                                @endif

                        </h6>
                        <h6 class="text-start"><strong>Tournament Bracket:&nbsp;</strong>

                            @if ($tournament->tournament_bracket == 1)
                                    Single - Elimination
                                @elseif ($tournament->tournament_bracket == 2)
                                    Double - Elimination
                                @elseif ($tournament->tournament_bracket == 3)
                                    Round - Robin Elimination
                                @endif

                        </h6>
                        <h6 class="text-start" style="margin-left: 20px;"><strong>Third place enabled ? :&nbsp;</strong>

                            @if ($tournament->enable_third_place = 1)
                                Disabled
                            @elseif ($tournament->enable_third_place = 2)
                                Enabled
                            @endif
                        </h6>
                        <h6 class="text-start" style="margin-left: 20px;">
                            <strong>Bracket Size:&nbsp;</strong> {{ $tournament->single_bracket_size }}</h6>
                        <h6 class="text-start" style="margin-left: 20px;">
                            <strong>Best of :&nbsp;</strong> {{ $tournament->single_best_of_rounds }}</h6>
                        <h6 class="text-start" style="margin-left: 20px;">
                            <strong>Entry Fee :&nbsp;</strong>

                            @if ($tournament->tournament_fee == 1)
                                    Have
                                @else
                                    None
                                @endif

                        </h6>
                        @if ($tournament->tournament_fee == 1)
                            <h6 class="text-start" style="margin-left: 31px;"><strong>Entry Price :</strong> &nbsp; {{ $tournament->tournament_price }}</h6>
                        @endif

                    </div>
                    @elseif ($tournament->tournament_bracket == 2)
                    <div class="col-5">
                        <h6 class="text-start">
                            <strong>Tournament Name: </strong>&nbsp;{{ $tournament->tournament_name }}
                        </h6>
                        <h6 class="text-start">
                            <strong>Data and Time:&nbsp;</strong> {{$tournament->tournament_date}}
                        </h6>
                        <h6 class="text-start">
                            <strong>Sport&nbsp; /&nbsp; E-Sport:</strong>

                            @if ($tournament->tournament_sport_type == 1)
                                Sports
                            @elseif ($tournament->tournament_sport_type == 2)
                                E-sports
                            @endif

                        </h6>
                        <h6 class="text-start"><strong>Type of Sport:</strong> &nbsp;

                            @if ($tournament->tournament_sport_type == 1)
                                    @if ($tournament->tournament_sport == 1)
                                        Basketball
                                    @elseif ($tournament->tournament_sport == 2)
                                        Volleyaball
                                    @endif
                                @elseif ($tournament->tournament_sport_type == 2)
                                    @if ($tournament->tournament_sport_type == 1)
                                        League of Legends - LoL
                                    @elseif ($tournament->tournament_sport_type == 2)
                                        Defense of the Ancients 2 - DotA 2
                                    @endif
                                @endif

                        </h6>
                        <h6 class="text-start"><strong>Tournament Bracket:</strong> &nbsp;

                            @if ($tournament->tournament_bracket == 1)
                                    Single - Elimination
                                @elseif ($tournament->tournament_bracket == 2)
                                    Double - Elimination
                                @elseif ($tournament->tournament_bracket == 3)
                                    Round - Robin Elimination
                                @endif

                        </h6>
                        <h6 class="text-start" style="margin-left: 20px;"><strong>Bracket Size:</strong> &nbsp;{{ $tournament->double_bracket_size }}</h6>
                        <h6 class="text-start" style="margin-left: 20px;"><strong>Best of :</strong> &nbsp;{{ $tournament->double_best_of_rounds }}</h6>
                        <h6 class="text-start" style="margin-left: 20px;"><strong>Entry Fee :</strong> &nbsp;

                            @if ($tournament->tournament_fee == 1)
                                    Have
                                @else
                                    None
                                @endif

                        </h6>
                        @if ($tournament->tournament_fee == 1)
                            <h6 class="text-start" style="margin-left: 31px;"><strong>Entry Price :</strong> &nbsp; {{ $tournament->tournament_price }}</h6>
                        @endif
                    </div>
                    @elseif ($tournament->tournament_bracket == 3)

                    <div class="col-5">
                        <h6 class="text-start"><strong>Tournament Name: </strong>&nbsp;{{ $tournament->tournament_name }}</h6>
                        <h6 class="text-start"><strong>Data and Time:&nbsp;</strong> {{ $tournament->tournament_date }}</h6>
                        <h6 class="text-start"><strong>Sport&nbsp; /&nbsp; E-Sport:</strong>

                            @if ($tournament->tournament_sport_type == 1)
                                Sports
                            @elseif ($tournament->tournament_sport_type == 2)
                                E-sports
                            @endif

                        </h6>
                        <h6 class="text-start"><strong>Type of Sport:</strong> &nbsp;

                            @if ($tournament->tournament_sport_type == 1)
                                    @if ($tournament->tournament_sport == 1)
                                        Basketball
                                    @elseif ($tournament->tournament_sport == 2)
                                        Volleyaball
                                    @endif
                                @elseif ($tournament->tournament_sport_type == 2)
                                    @if ($tournament->tournament_sport_type == 1)
                                        Lol
                                    @elseif ($tournament->tournament_sport_type == 2)
                                        Dota
                                    @endif
                                @endif

                        </h6>
                        <h6 class="text-start"><strong>Tournament Bracket:</strong> &nbsp;

                            @if ($tournament->tournament_bracket == 1)
                                    Single - Elimination
                                @elseif ($tournament->tournament_bracket == 2)
                                    Double - Elimination
                                @elseif ($tournament->tournament_bracket == 3)
                                    Round - Robin Elimination
                                @endif

                        </h6>
                        <h6 class="text-start" style="margin-left: 20px;">
                            <strong>Number of groups? :</strong> &nbsp;{{ $tournament->num_groups }}</h6>
                        <h6 class="text-start" style="margin-left: 20px;">
                            <strong>Number of players per group:</strong> {{ $tournament->num_player_per_group }}<br></h6>
                        <h6 class="text-start" style="margin-left: 20px;">
                            <strong>Match style:</strong>

                            @if ($tournament->round_robin_match_style == 1 )
                                Best of
                            @elseif ( $tournament->round_robin_match_style == 2 )
                                Games per match
                            @endif

                        </h6>
                        <h6 class="text-start" style="margin-left: 20px;">
                            <strong>Entry Fee :</strong> &nbsp;

                            @if ($tournament->tournament_fee == 1)
                                    Have
                                @else
                                    None
                                @endif

                        </h6>
                        @if ($tournament->tournament_fee == 1)
                            <h6 class="text-start" style="margin-left: 31px;">
                                <strong>Entry Price :</strong> &nbsp; {{ $tournament->tournament_price }}</h6>
                        @endif
                    </div>
                    @endif

                    <div class="col ">
                        <div class="card shadow col">
                            <h6 class="card-header">Registered Participants</h6>


                            <div class="card-body">
                                <div class="border overflow-auto p-3" id="" style="min-height: 200px;">
                                    0 Registered
                                    <hr>
                                </div>
                                <div class="my-2 col text-center">
                                    <button class=" btn border btn-bg">Bracket Tournament</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
