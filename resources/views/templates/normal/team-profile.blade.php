@extends('templates.normal.main')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4 row container">
        <div class="col-12">
            <h3 class="text-dark mb-4">{{ $team->team_name }}</h3>
        </div>
        <div class="col-12 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $team->team_name }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $team->game }}</td>
                            </tr>
                            <tr>
                                <th>Wins</th>
                                <td>{{ $team->win_count }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h3 class="text-dark mb-4">Matches</h3>
            <div class="card shadow">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tournament</th>
                                <th>Level</th>
                                <th>Order</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->matches as $match)
                            <tr>
                                <td>{{ $match->tournament->tournament_name }}</td>
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
                                    <a href="{{ route('newsfeed.tournament.show.match', ['tournamentModel' => $match->tournament->id, 'tournamentMatch' => $match->id]) }}}"
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
</div>
@endsection
