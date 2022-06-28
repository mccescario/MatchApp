@extends('templates.normal.main')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4 row container">
        <div class="col-12">
            <h3 class="text-dark mb-4">{{ $tournament->tournament_name }}</h3>
        </div>
        <div class="col-12 mb-4">
            <div class="card shadow mx-auto" style="width: 560px;">
                <div class="card-img-top">
                    {!! $latestCurrent->stream_link !!}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $latestCurrent->team_one_name }} VS {{ $latestCurrent->team_two_name }} -
                        {{
                        $latestCurrent->tournament->tournament_name }}</h5>
                    <p class="card-text">Match {{ $latestCurrent->order }}
                        @switch($latestCurrent->level)
                        @case(4)
                        <span class="text-secondary"> Qualifications </span>
                        @break
                        @case(3)
                        <span class="text-primary">Quarter-Finals</span>
                        @break
                        @case(2)
                        <span class="text-info">Semi-Finals</span>
                        @break
                        @case(1)
                        <span class="text-success">Finals</span>
                        @break
                        @endswitch
                    </p>

                    <p class="card-text">Score: {{ $latestCurrent->team_1_score }} - {{ $latestCurrent->team_2_score }}
                    </p>
                </div>
            </div>

        </div>
        <div class="col-12 mb-4">
            <h3 class="my-4 text-dark">Matches</h3>
            <div class="card shadow">
                <div class="card-body mx-auto">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Team 1</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Team 2</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Winner</th>
                                    <th scope="col">Current Match</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($tournament->matches as $match)
                                <tr>
                                    <td>
                                        @isset($match->team_1_id)
                                        <a href="{{ route('team.profile', $match->team_1_id) }}">{{
                                            $match->team_one_name }}</a>
                                        @endisset
                                    </td>
                                    <td>{{ $match->team_1_score }}</td>
                                    <td>
                                        @isset($match->team_2_id)
                                        <a href="{{ route('team.profile', $match->team_2_id) }}">{{
                                            $match->team_two_name }}
                                        </a>
                                        @endisset
                                    </td>
                                    <td>{{ $match->team_2_score }}</td>
                                    <td>
                                        @switch($match->level)
                                        @case(4)
                                        Qualifications
                                        @break
                                        @case(3)
                                        Quarter-Finals
                                        @break
                                        @case(2)
                                        Semi-Finals
                                        @break
                                        @case(1)
                                        Finals
                                        @break
                                        @endswitch
                                    </td>
                                    <td>Match {{ $match->order }}</td>
                                    <td>
                                        @isset($match->winning_team)
                                        @if ($match->winning_team == 1)
                                        {{ $match->team_one_name }}
                                        @else
                                        {{ $match->team_two_name }}
                                        @endif
                                        @endisset
                                    </td>
                                    <td>
                                        @if ($match->is_current)
                                        <span class="badge badge-success">Current Match</span>
                                        @else
                                        <span class="badge badge-secondary">Not Current Match</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('newsfeed.tournament.show.match', ['tournamentModel' => $tournament->id, 'tournamentMatch' => $match->id]) }}}"
                                            class="btn btn-info text-white">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-75 mx-auto mb-12">
            {!! $bracket !!}
        </div>
    </div>
</div>
@endsection
