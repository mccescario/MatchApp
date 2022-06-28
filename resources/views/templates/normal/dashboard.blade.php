@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">News Feed</h3>
    </div>
    <ul class="nav justify-content-start">
        <li class="nav-item">
            <a class=" btn bg-purple" style="color: #fff;" href="#">Matches</a>
        </li>
        <li class="nav-item">
            <a class=" btn " href="{{ route('newsfeed.tournament') }}">Tournaments</a>
        </li>
    </ul>

    <div class="row">
        @foreach ($matches as $match)
        <div class="col-12 mb-4">
            <div class="card mx-auto" style="width: 560px;">
                <div class="card-img-top">
                    {!! $match->stream_link !!}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $match->team_one_name }} VS {{ $match->team_two_name }} - {{
                        $match->tournament->tournament_name }}</h5>
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

                    <p class="card-text">Score: {{ $match->team_1_score }} - {{ $match->team_2_score }}</p>
                    <a href="{{ route('newsfeed.tournament.show', $match->tournament->id) }}"
                        class="btn btn-primary">View {{ $match->tournament->tournament_name }}</a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="mx-auto">
            {{ $matches->links() }}
        </div>
    </div>
</div>

@endsection
