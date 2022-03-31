@extends('templates.host.main')

@section('content')



<div>
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3"> Back</a>
</div>

    <div>
        <h1 style="padding: 20px 0px;">Edit Tournament Details</h1>
    </div>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-bg mb-3"> Back</a>
    </div>

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

    <div class="container">
        <form method="POST" action="{{ route('tournament.update' , $tournament->id) }}"  x-data="{bracket: {{ $tournament->tournament_bracket }}, sports: {{ $tournament->tournament_sport_type }}, sport: {{ $tournament->tournament_sport }}, esport: {{ $tournament->tournament_esport }} , fee: 2, single_round: {{ $tournament->single_best_of_rounds}} }" >
            @csrf
            @method('PUT')
            <div class="d-lg-flex justify-content-lg-center align-items-lg-center" style="text-align: center;">
                <div>
                    <label class="form-label" style="margin: 3px;padding: 4px;">Tournament Name:&nbsp;</label>
                    <input type="text" name="tournament_name" placeholder="{{ $tournament->tournament_name}}">
                </div>
                <div>
                    <label class="form-label" style="margin: 3px;padding: 4px;">Start Date:&nbsp;</label>
                    <input placeholder="{{ $tournament->tournament_date }}" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="tournament_date" >
                </div>
            </div>
            <div>
                <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin: 10px;">
                    <x-jet-label for="sports" class="form-label" style="margin: 3px;padding: 4px;" value=" {{__('Sports / E-Sports: ')}}"/>
                    <select name=tournament_sport_type x-model="sports" style="padding: 1px 2px;">
                            <option value="1">Sports</option>
                            <option value="2">E-Sports</option>
                    </select>
                </div>
            </div>

            <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin: -8px;">

                <div style="margin: 13px;" x-show="sports == 1">
                    <x-jet-label class="form-label" value="{{ __('Select Sport Game:') }}"/>
                    <select style="padding: 1px 2px;" name="tournament_sport">
                        <option value="1">Basketball</option>
                        <option value="2">Volleyball</option>
                    </select>
                </div>

                <div style="margin: 13px;" x-show="sports == 2">
                    <x-jet-label class="form-label" value="{{ __('Select E-Sport Game:')}}"/>
                    <select style="padding: 1px 2px;" x-model="esport" name="tournament_esport">
                        <option value="1">League of Legends (LoL)</option>
                        <option value="2">Defence of the Ancients 2 (DOTA2)</option>
                    </select>
                </div>

                <div style="margin: 13px;">
                    <x-jet-label for="bracket" class="form-label" value="{{ __('Bracket Type: ')}}"/>
                    <select name="tournament_bracket" x-model="bracket" style="padding: 1px 2px;">

                        <option value="1">Single - Elimination</option>
                        <option value="2">Double - Elimination</option>
                        <option value="3">Round - Robin Elimination</option>
                    </select>
                </div>
            </div>

            <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="margin: -8px;">
                <div x-show="bracket == 1" >
                    <div class="d-flex justify-content-center align-self-centermy-1">

                        <label for="">&nbsp;Enable Third Place Match </label>
                        <select name="enable_third_place" id="">
                            <option value="1">Disabled</option>
                            <option value="2">Enabled</option>
                        </select>

                    </div>

                    <div class="my-1">
                        <x-jet-label class="form-label" value="{{ __('Bracket Size (# of teams/ players): ')}}"/>
                        <input type="number" name="single_bracket_size" id="" placeholder="{{ $tournament->single_bracket_size }}">
                    </div>

                    <div class="my-1">
                        <x-jet-label class="form-label" value="{{ __('Best of for all rounds: ')}}"/>
                        <select name="single_best_of_rounds" style="padding: 1px 2px;" x-model="single_round">
                            <option value="1">1</option>
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
                        <x-jet-label class="form-label" value="{{ __('Bracket Size (# of teams/ players): ')}}"/>
                        <input type="number" name="double_bracket_size" id="" placeholder="{{ $tournament->double_bracket_size }}">
                    </div>

                    <div class="mt-2">
                        <x-jet-label class="form-label" value="{{ __('Best of for all rounds: ')}}"/>
                        <select name="double_best_of_rounds" style="padding: 1px 2px;">
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
                    <div class="mt-2">
                        <x-jet-label  class="form-label" value="{{ __('Number of groups: ')}}"/>
                        <input style="width:100px; padding: 1px 2px;" type="number" name="num_groups" id="">
                    </div>

                    <div class="mt-2">
                        <x-jet-label  class="form-label" value="{{ __('Number of players per groups: ')}}"/>
                        <input style="width:100px; padding: 1px 2px;" type="number" name="num_player_per_group" id="">
                    </div>

                    <div class="mt-2">
                        <x-jet-label class="form-label" value="{{ __('Match style: ')}}"/>
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
                        <x-jet-label for="fee" class="form-label" value="{{ __('with Entry Fee:') }}"/>
                        <select name="tournament_fee" x-model="fee" style="padding: 1px 2px;">
                            <option value="1">Yes</option>
                            <option value="2">None</option>
                        </select>
                    </div>

                    <div style="margin: 13px;" x-show="fee == 1">
                        <label class="form-label">Price: </label>
                        <input type="text" name="tournament_price">
                    </div>

                </div>
            </div>
            <div class="text-center" style="padding: 0px;margin: 0px;margin-top: 10px;">
                <button class="btn btn-primary" type="submit" style="padding: 9px 12px;background: var(--bs-yellow);color: rgb(26,69,11);">Save Changes</button>
            </div>

        </form>
        </div>

    </div>


@endsection
