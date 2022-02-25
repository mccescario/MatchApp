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
        <a href="{{ url()->previous() }}" class="btn btn-bg mb-3"> Back</a>
    </div>

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

@endsection
