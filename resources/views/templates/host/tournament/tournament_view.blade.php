@extends('templates.host.main')

@section('content')


<div class="container-fluid">
    <h3 class="text-dark mb-4">{{ $tournament->tournament_name }}</h3><button class="btn btn-primary btn-sm" type="submit" style="margin-top: 18px;margin-left: 0px;"><i class="fas fa-code-branch" style="width: 20px;"></i>&nbsp;Generate Bracket</button>
    <div class="row mb-3">
        <div class="col-lg-8" style="width: 897.6600000000002px;">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3" style="width: 875.px;">
                        <div class="card-header py-3" style="height: 48px;">
                            <p class="text-primary fw-bold" style="height: 24px;margin-top: -4px;width: 904.6600000000002px;">Tournament Details</p>
                        </div>
                        <div class="card-body" style="width: 850.6600000000002px;">
                            <form method="POST" action="{{ route('tournament.update' , $tournament->id) }}" >
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="tournament_name"><strong>Tournament Name</strong></label>
                                            <input class="form-control" type="text" id="tournament_name" name="tournament_name" placeholder="{{ $tournament->tournament_name }}" name="username"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="tournament_size"><strong>Tournament Size - @if ($tournament->tournament_size == 1)2 @elseif ($tournament->tournament_size == 2)4  @elseif ($tournament->tournament_size == 3) 8 @elseif ($tournament->tournament_size == 4)16 @elseif ($tournament->tournament_size == 5)32 @elseif ($tournament->tournament_size == 6)@elseif ($tournament->tournament_size == 7)128 @endif</strong><br></label>
                                            <select class="form-select" name="tournament_size" id="tournament_size" placeholder="">
                                                <option value="0" selected>Change Tournament size</option>
                                                    <option value="1">2</option>
                                                    <option value="2">4</option>
                                                    <option value="3">8</option>
                                                    <option value="4">16</option>
                                                    <option value="5">32</option>
                                                    <option value="6">64</option>
                                                    <option value="7">128</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="tournament_format"><strong>Tournament Format - @if ($tournament->tournament_format == 1) Single - Elimination @elseif ($tournament->tournament_format == 2)Double - Elimination @elseif ($tournament->tournament_format == 3)Round - Robin Elimination @endif</strong></label>
                                            <select class="form-select" type="text" id="tournament_format" name="tournament_format" placeholder="">
                                                <option value="0" selected>Change Tournament Format</option>
                                                <option value="1">Single-Elimination</option>
                                                <option value="2">Double-Elimination</option>
                                                <option value="3">Round Robin</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="last_name"><strong>Date of Tournament - {{$tournament->tournament_date_from }} - {{$tournament->tournament_date_to }} </strong></label>
                                            <input class="form-control" type="text" id="last_name-3" name="last_name" placeholder=""></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="tournament_sport"><strong>Game - @if ($tournament->tournament_sport_type == 1) @if ($tournament->tournament_sport == 1)Basketball @elseif ($tournament->tournament_sport == 2)Volleyaball @elseif ($tournament->tournament_sport == 3)Football @endif @elseif ($tournament->tournament_sport_type == 2) @if ($tournament->tournament_esport == 1) Valorant @elseif ($tournament->tournament_esport == 2)Mobile Legends @elseif ($tournament->tournament_esport == 3)Dota 2 @elseif ($tournament->tournament_esport == 4)Counter Strike: Global Offensive @elseif ($tournament->tournament_esport == 5)League of Legends @elseif ($tournament->tournament_esport == 6)Call of Duty: Mobile @endif @endif</strong></label>
                                            @if ($tournament->tournament_sport_type == 1)
                                            <select class="form-control" type="text" id="tournament_sport" name="tournament_sport" placeholder="">
                                                <option value="0" selected>Change the Game</option>
                                                <option value="1">Basketball</option>
                                                <option value="2">Volleyball</option>
                                                <option value="3">Football</option>
                                            </select>
                                            @elseif ($tournament->tournament_sport_type == 2)
                                            <select class="form-select" id="tournament_esport" name="tournament_esport">
                                                <option value="0" selected>Change the Video Game</option>
                                                <option value="1">Valorant</option>
                                                <option value="2">Mobile Legends</option>
                                                <option value="3">Dota 2</option>
                                                <option value="4">Counter Strike: Global Offensive</option>
                                                <option value="5">League of Legends</option>
                                                <option value="6">Call of Duty: Mobile</option>
                                            </select>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="last_name"><strong>Series - @if ($tournament->tournament_format == 1) @if ($tournament->tournament_series == 1)Knockouts @elseif ($tournament->tournament_series == 2)Best of 3 @elseif ($tournament->tournament_series == 3)Best of 5 @elseif ($tournament->tournament_series == 4)Best of 7 @endif @elseif ($tournament->tournament_format == 2) @if ($tournament->tournament_series == 1)Knockouts @elseif ($tournament->tournament_series == 2)Best of 3 @elseif ($tournament->tournament_series == 3)Best of 5 @elseif ($tournament->tournament_series == 4)Best of 7 @endif @elseif ($tournament->tournament_format == 3) @if ($tournament->tournament_participant_play == 1)Once @elseif ($tournament->tournament_participant_play == 2)Twice @elseif ($tournament->tournament_participant_play == 3)Thrice @endif @endif</strong></label>
                                            @if ($tournament->tournament_format == 1)
                                            <select class="form-select" id="tournament_series" name="tournament_series">
                                                <option value="0" selected>Change Series</option>
                                                <option value="1">Knockouts</option>
                                                <option value="2">Best of 3</option>
                                                <option value="3">Best of 5</option>
                                                <option value="4">Best of 7</option>
                                            </select>
                                            @elseif ($tournament->tournament_format == 2)
                                            <select class="form-select" id="tournament_series" name="tournament_series">
                                                <option value="0" selected>Change Series</option>
                                                <option value="1">Knockouts</option>
                                                <option value="2">Best of 3</option>
                                                <option value="3">Best of 5</option>
                                                <option value="4">Best of 7</option>
                                            </select>
                                            @elseif ($tournament->tournament_format == 3)
                                            <select class="form-select" id="tournament_participant_play" name="tournament_participant_play">
                                                <option value="0" selected>Change Series</option>
                                                <option value="1">Once</option>
                                                <option value="2">Twice</option>
                                                <option value="3">Thrice</option>
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3" style="margin-left: 0px;height: 25px;">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-edit" style="width: 20px;"></i>Update
                                    </button>
                                </form>

                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fas fa-search" style="width: 20px;"></i>View Registrants
                                    </button>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <div class="card-header py-3" style="height: 48px;">
                    <p class="text-primary fw-bold" style="margin-top: -4px;">List of Participants</p>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 275px;">Team Name</th>
                                                <th style="text-align: center;">Members</th>
                                                <th style="text-align: left;width: 75px;">Course</th>
                                                <th style="width: 250px;">Representative</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: left;">Team ABAI</td>
                                                <td style="width: 110px;text-align: center;">5</td>
                                                <td>BSITWMA</td>
                                                <td>Marthen Christ Escario</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" style="height: 25px;"><button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-edit" style="width: 20px;"></i>Update</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
    <div class="card-header p-3">
        <h3 >View Tournament Details</h3>
    </div>



    <div class="container p-3">
        <div class="card shadow">
            <h5 class="card-header">Overview</h5>
            <div class="card-body p-5">
                <div class="row">

                    /{{--@if ($tournament->tournament_bracket == 1)
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
    </div>--}}
</div>-->

@endsection
