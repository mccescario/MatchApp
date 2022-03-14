@extends('templates.host.main')

@section('content')



    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3"> Back</a>
    </div>

    <div class="container-fluid">
        <h3 class="text-dark mb-4">Tournament Hosting</h3>
        <form class="row mb-3" action="{{ url('tournament') }}" method="POST">
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary fw-bold m-0">Set Schedule</h6>
                    </div>
                    <div class="card-body"><label class="form-label" for="email"><strong>Select Date</strong></label>
                        <div></div>
                        <h4 class="small fw-bold"></h4>
                        <div class="form-group mb-3">
                            <div class="input-group mb-4">
                                <span class="input-group-text" style="width: 63px;">From</span>
                                <input class="form-control" type="date" id="datePicker"></div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group mb-4">
                                <span class="input-group-text" style="width: 63px;">To</span>
                                <input class="form-control" type="date" id="datePicker-1"></div>
                        </div><label class="form-label" for=""><strong>Select Time</strong></label>
                        <div class="form-group mb-3">
                            <div class="input-group mb-4">
                                <span class="input-group-text">Time</span>
                                <input class="form-control" type="time" id="datePicker-2"></div>
                        </div>
                        <h4 class="small fw-bold"><span class="float-end"></span></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Customize Tournament</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="t_name"><strong>Tournament Name</strong></label>
                                                <input class="form-control" type="text" id="t_name" placeholder="" name="t_name" style="color: rgb(133, 135, 150);">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="t_type"><strong>Tournament Type</strong></label>
                                                <select class="form-select" id="t_type" placeholder="" name="t_type">
                                                    <option value="1">Sports</option>
                                                    <option value="2">eSports</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="t_size">
                                                <strong>Tournament Size</strong></label>
                                                <select class="form-select" name="t_size" id="t_size">
                                                    <option selected>Select Tournament Size</option>
                                                    <option value="1">2</option>
                                                    <option value="2">4</option>
                                                    <option value="3">8</option>
                                                    <option value="4">16</option>
                                                    <option value="5">32</option>
                                                    <option value="6">64</option>
                                                    <option value="7">128</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="t_format">
                                                <strong>Tournament Format</strong><br></label>
                                                <select class="form-select" id="t_format" name="t_format">
                                                    <option selected>Select Tournament Format</option>
                                                    <option value="1">Single-Elimination</option>
                                                    <option value="2">Double-Elimination</option>
                                                    <option value="3">Round Robin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="t_game"><strong>Select Game</strong></label>
                                                <select class="form-select" id="t_game" name="t_game">
                                                    <option selected>Select a Game</option>
                                                    <option value="1">Basketball</option>
                                                    <option value="2">Volleyball</option>
                                                    <option value="3">Badminton</option>
                                                    <option value="4">Chess</option>
                                                </select>
                                                <select class="form-select" id="t_game" name="t_game">
                                                    <option value="1">Valorant</option>
                                                    <option value="2">Mobile Legends</option>
                                                    <option value="3">Dota 2</option>
                                                    <option value="4">Counter Strike: Global Offensive</option>
                                                    <option value="5">League of Legends</option>
                                                    <option value="6">Call of Duty: Mobile</option>
                                                    <option value="7">Hearthstone</option>
                                                    <option value="8">PlayerUnkown's Battleground</option>
                                                    <option value="9">Overwatch</option>
                                                    <option value="10">Fortnite</option>
                                                    <option value="11">Apex Legends</option>
                                                    <option value="12">League of Legends: Wild Rift</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="t_series"><strong>Series</strong><br></label>
                                                <select class="form-select" id="t_series" name="t_series">
                                                    <option value="1">Knockouts</option>
                                                    <option value="2">Championship Best of 3</option>
                                                    <option value="3">Championship Best of 5</option>
                                                    <option value="4">Championship Best of 7</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">

                                        <button class="btn btn-primary btn-sm" type="submit" style="width: 150.5px;height: 38px;">Create Tournament</button></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--
    <div class=" card shadow mb-5" style="padding: 0px; padding-top:0px;">
        <div class="card-header">
            <h2 style="padding: 0px 0px;">Tournament Registration</h2>
        </div>
        <form class="card-body" action="{{ url('tournament') }}" method="POST" x-data="{bracket: 1, sports: 1, fee: 2}" >
            @csrf
            <div class="justify-content-lg-center align-items-lg-center" style="text-align: center;">
            <div class="d-lg-flex justify-content-lg-center align-items-lg-center" style="text-align: center;">
                <div class="mx-2">
                    <label class="form-label" style="margin: 3px;padding: 4px;"><strong>{{__('Tournament Name:')}}&nbsp;</strong></label>
                    <input class="form-control" type="text" name="tournament_name">
                </div>
                <div class="mx-2">
                    <label class="form-label" style="margin: 3px;padding: 4px;"><strong>{{__('Start Date:')}}&nbsp;</strong> </label>
                    <input class="form-control" type="date" name="tournament_date">
                </div>
            </div>
            <div>
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin: 10px;">
                    <div>
                    <label for="sports" class="form-label" style="margin: 3px;padding: 4px;"><strong>{{__('Tournament Category: ')}}</strong></label>
                    <select class="form-control" name=tournament_sport_type x-model="sports" style="padding: 1px 2px;">
                        <option value="1">Sports</option>
                        <option value="2">E-Sports</option>
                    </select>
                </div>
                </div>
            </div>

            <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin: -8px;">

                <div class="w-auto" style="margin: 13px;" x-show="sports == 1">
                    <label class="form-label col"><strong>{{ __('Select Sport Game:') }}</strong></label>
                    <select class="form-control  col" style="padding: 1px 2px;" name="tournament_sport">
                        <option value="1">Basketball</option>
                        <option value="2">Volleyball</option>
                    </select>
                </div>

                <div class="" style="margin: 13px;" x-show="sports == 2">
                    <label class="form-label col" ><strong>{{ __('Select E-Sport Game:')}}</strong></label>
                    <select class="form-control w-auto col" style="padding: 1px 2px;" name="tournament_esport">
                        <option value="1">League of Legends (LoL)</option>
                        <option value="2">Defence of the Ancients 2 (DOTA2)</option>
                    </select>
                </div>

                <div>
                    <label for="bracket" class="form-label col" ><strong>{{ __('Bracket Type: ')}}</strong></label>
                    <select class="form-control w-auto col" name="tournament_bracket" x-model="bracket" style="padding: 1px 2px;">

                        <option value="1">Single - Elimination</option>
                        <option value="2">Double - Elimination</option>
                        <option value="3">Round - Robin Elimination</option>
                    </select>
                </div>
            </div>

            <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin: -8px;">
                <div x-show="bracket == 1" >
                    <div class="d-flex justify-content-center align-self-center my-1 w-auto">
                        <label class="form-label col-9 " style="margin: 4px;">
                            <strong>&nbsp;Enable Third Place Match :</strong>
                        </label>
                        <select class="form-control w-auto col-5" name="enable_third_place" id="">
                            <option value="1">Disabled</option>
                            <option value="2">Enabled</option>
                        </select>
                    </div>

                    <div class="my-1">
                        <label class="form-label col" value=""><strong>{{ __('Bracket Size (# of teams/ players): ')}}</strong></label>
                        <input class="form-control w-25col" type="number" name="single_bracket_size" id="">
                    </div>

                    <div class="my-1">
                        <label class="form-label" >
                            <strong>{{ __('Best of for all rounds: ')}}</strong>
                        </label>
                        <select class="form-control w-25" name="single_best_of_rounds" style="padding: 1px 2px;">
                            <option value="1" selected>1</option>
                            <option value="2">3</option>
                            <option value="3">5</option>
                            <option value="4">7</option>
                            <option value="5">9</option>
                            <option value="6">11</option>
                        </select>
                    </div>

                </div>

                <div x-show="bracket == 2" style="margin: 13px;">
                    <div>
                        <label class="form-label col" value="">
                            <strong>{{ __('Bracket Size (# of teams/ players): ')}}</strong>
                        </label>
                        <input class="form-control w-auto col" type="number" name="double_bracket_size" id="">
                    </div>

                    <div class="mt-2">
                        <label class="form-label col" value="">
                            <strong>{{ __('Best of for all rounds: ')}}</strong>
                        </label>
                        <select class="form-control w-auto col" name="double_best_of_rounds" style="padding: 1px 2px;">
                            <option value="1" selected>1</option>
                            <option value="2">3</option>
                            <option value="3">5</option>
                            <option value="4">7</option>
                            <option value="5">9</option>
                            <option value="6">11</option>
                        </select>
                    </div>
                </div>

                <div x-show="bracket == 3">
                    <div class="mt-2 col">
                        <label  class="form-label" value="">
                            <strong>{{ __('Number of groups: ')}}</strong>
                        </label>
                        <input style="width:100px; padding: 1px 2px;" type="number" name="num_groups" id="">
                    </div>

                    <div class="mt-2 col">
                        <label  class="form-label" value="">
                            <strong>{{ __('Number of players per groups: ')}}</strong>
                        </label>
                        <input style="width:100px; padding: 1px 2px;" type="number" name="num_player_per_group" id="">
                    </div>

                    <div class="mt-2 col">
                        <label class="form-label" value="">
                            <strong>{{ __('Match style: ')}}</strong>
                        </label>
                        <select name="round_robin_match_style" style="padding: 1px 2px; width:235px;">
                            <option value="1">Best of</option>
                            <option value="2">Games per match</option>
                        </select>
                        <input style="padding: 1px 2px; width:50px;" type="number" name="games_per_match" id="">
                    </div>


                </div>
            </div>

            <div>
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin: -8px;">
                    <div style="margin: 13px;">
                        <label for="fee" class="form-label" value="">
                            <strong>{{ __('with Entry Fee:') }}</strong>
                        </label>
                        <select name="tournament_fee" x-model="fee" style="padding: 1px 2px;">
                            <option value="1">Yes</option>
                            <option value="2">None</option>
                        </select>
                    </div>

                    <div style="margin: 13px;" x-show="fee == 1">
                        <label class="form-label"><strong> Price: </strong></label>
                        <input type="text" name="tournament_price">
                    </div>

                </div>
            </div>
            <div class="text-center" style="padding: 0px;margin: 0px;margin-top: 10px;">
                <button class="btn btn-bg shadow" type="submit" style="padding: 9px 12px;">Register Tournament</button>
            </div>
            </div>
        </form>
</div>
-->
@endsection
