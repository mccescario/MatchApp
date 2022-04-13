@extends('templates.host.main')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4 text-dark">{{ $match->team_one_name }} VS {{ $match->team_two_name }}</h3>
    <div class="card mb-4 shadow">
        <div class="card-body">
            <table class="table">
                <tbody class="">
                    <tr>
                        <th>Team 1</th>
                        <td>
                            <a href="{{ route('team.profile', $match->team_1_id) }}">{{
                                $match->team_one_name }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Team 1 Score</th>
                        <td>{{ $match->team_1_score }}</td>
                    </tr>
                    <tr>
                        <th>Team 2</th>
                        <td>
                            <a href="{{ route('team.profile', $match->team_2_id) }}">{{
                                $match->team_two_name }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Team 1 Score</th>
                        <td>{{ $match->team_2_score }}</td>
                    </tr>
                    <tr>
                        <th>Level</th>
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
                    </tr>
                    <tr>
                        <th>Order</th>
                        <td>Match {{ $match->order }}</td>
                    </tr>
                    <tr>
                        <th>Winning Team</th>
                        <td>
                            @isset($match->winning_team)
                            @if ($match->winning_team == 1)
                            {{ $match->team_one_name }}
                            @else
                            {{ $match->team_two_name }}
                            @endif
                            @endisset
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <livewire:match-current-status-toggle :tournamentMatch="$match->id" />
    <h3 class="mb-4 text-dark">Youtube Match Link</h3>
    <div class="card mb-4 shadow">
        <div class="card-body">
            @error('stream_link')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('matches.update-stream-link', $match->id) }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" maxlength="500" class="form-control" placeholder="Youtube Embed Code"
                        aria-label="Youtube Link" id="stream_link" name="stream_link" value="{{ $match->stream_link }}">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Save</button>
                    </div>
                </div>
            </form>
            @if (isset($match->stream_link))
            {!! $match->stream_link !!}
            @endif
        </div>
    </div>
</div>
@endsection
