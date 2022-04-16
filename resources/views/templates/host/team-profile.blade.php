@extends('templates.host.main')

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
    </div>
</div>
@endsection
