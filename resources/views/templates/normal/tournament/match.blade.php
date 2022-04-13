@extends('templates.normal.main')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4 row container">
        <div class="col-12">
            <h3 class="text-dark mb-4">{{ $match->team_one_name }} VS {{ $match->team_two_name }} -
                {{ $match->tournament->tournament_name }}</h3>
        </div>
        <div class="col-12 mb-4">
            <div class="card shadow mx-auto" style="width: 560px;">
                <div class="card-img-top">
                    {!! $match->stream_link !!}
                </div>
                <div class="card-body">
                    <p class="card-text">Match {{ $match->order }}
                        @switch($match->level)
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

                    <p class="card-text">Score: {{ $match->team_1_score }} - {{ $match->team_2_score }}
                    </p>
                    <p class="card-text">
                        @isset($match->winning_team)
                        @if ($match->winning_team == 1)
                        <a href="{{ route('team.profile', $match->team_1_id) }}">
                            Winner:
                            {{ $match->team_one_name }}
                        </a>
                        @else
                        <a href="{{ route('team.profile', $match->team_2_id) }}">
                            Winner:
                            {{ $match->team_two_name }}
                        </a>
                        @endif
                        @endisset
                    </p>
                    <a href="{{ route('newsfeed.tournament.show', $match->tournament->id) }}"
                        class="btn btn-primary">View {{ $match->tournament->tournament_name }}</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
