<div class="row">
    <div class="col-7 border-right mx-auto">
        @foreach ($matches as $match)
        <div class="col-12 mb-2 mt-2">
            <div class="card mx-auto" style="width: 560px;">
                <div class="card-img-top">
                    {!! $match->stream_link !!}
                </div>
                <div class="card-body">
                    <h5 class="card-title text-body">{{
                        $match->tournament->name }}: {{ $match->team_one->name }} VS {{ $match->team_two->name }}</h5>
                    <p class="card-text text-body">Match {{ $match->order }}
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

                    <p class="card-text text-body">Score: {{ $match->team_1_score }} - {{ $match->team_2_score }}</p>
                    {{-- <a href="" class="btn btn-primary text-center">View {{ $match->tournament->tournament_name
                        }}</a> --}}
                    <a href="{{ route('tournaments.tournaments.view', $match->tournament->id) }}"
                        class="btn btn-primary">View {{
                        $match->tournament->name }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
