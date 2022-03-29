@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Tournaments</h3>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>You are joining to this tournament: <strong>{{ $tournament->tournament_name }}</strong></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div>
        <form action="{{ route('tournament.join', $tournament->id) }}" method="POST">

            @csrf
            <input name="tournament_model_id" type="hidden" value="{{ $tournament->id }}">
            <input name="status" type="hidden" value="JOINING">
            <strong>Your Team:</strong>
            <select name="team_id" class="form-control" required>
                <option value="">-- Select Team --</option>
            @foreach($teams as $team)
                <option value="{{ $team->id}}">{{ $team->team_name}}</option>
            @endforeach
            </select>
            <br>
            <button class="btn btn-primary" type="submit">Join</button>
        </form>
    </div>
</div>

@endsection
