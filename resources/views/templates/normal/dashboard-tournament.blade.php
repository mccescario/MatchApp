@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <div class="mb-4 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-dark">News Feed - Tournament</h3>
    </div>
    <div class="col-12 row">
        <div class="col-6">
            <ul class="nav justify-content-start">
                <li class="nav-item">
                    <a class="btn" href="{{ route('player-dashboard') }}">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="btn bg-purple" style="color: #fff;" href="#">Tournaments</a>
                </li>
            </ul>
        </div>

        <div class="col-6">
            <form class="form-inline" action="{{ route('newsfeed.tournament') }}" method="GET">
                <div class="mb-3 mr-2">
                    <select class="form-select" id="category" name="category">
                        <option value="" selected>Select a Type</option>
                        <option @if (request()->has('category')) @if (request()->query('category') == 1)selected
                            @endif @endif value="1">Sports</option>
                        <option @if (request()->has('category')) @if (request()->query('category') == 2)selected
                            @endif @endif value="2">eSports</option>
                    </select>
                </div>
                <div class="mb-3 input-group">
                    <input type="text" class="form-control" placeholder="Search Tournament" id="search" name="search"
                        aria-describedby="basic-addon2" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            @foreach ($tournaments as $tournament)
            <div class="mb-4 col-12">
                <div class="mx-auto card" style="width: 560px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tournament->tournament_name }}</h5>
                        <p class="card-text">
                            @switch($tournament->tournament_sport_type)
                            @case(1)
                            Sports
                            @break
                            @case(2)
                            E-Sports
                            @break
                            @default

                            @endswitch -
                            @isset($tournament->tournament_sport)
                            @switch($tournament->tournament_sport)
                            @case(1)
                            Basketball
                            @break
                            @case(2)
                            Volleyball
                            @break
                            @case(3)
                            Football
                            @break
                            @default

                            @endswitch
                            @endisset
                            @isset($tournament->tournament_esport)
                            @switch($tournament->tournament_esport)
                            @case(1)
                            Valorant
                            @break
                            @case(2)
                            Mobile Legends
                            @break
                            @case(3)
                            Dota 2
                            @break
                            @case(4)
                            Counter Strike: Global Offensive
                            @break
                            @case(5)
                            League of Legends
                            @break
                            @case(6)
                            Call of Duty: Mobile
                            @break
                            @default

                            @endswitch
                            @endisset
                        </p>
                        <p class="mb-4 card-text">
                            Series:
                            @switch($tournament->tournament_series)
                            @case(1)
                            Knockouts
                            @break
                            @case(2)
                            Best of 3
                            @break
                            @case(3)
                            Best of 5
                            @break
                            @case(4)
                            Best of 7
                            @break
                            @default

                            @endswitch
                        </p>
                        @if (count($tournament->matches) > 0)
                        <a href="{{ route('newsfeed.tournament.show', $tournament->id) }}" class="btn btn-outline-dark">View
                            {{ $tournament->tournament_name }}
                        </a>
                        @else
                        <p class="badge badge-pill badge-warning">No matches yet</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            <div class="mx-auto">
                {{ $tournaments->links() }}
            </div>
        </div>
    </div>

    @endsection
