@extends('templates.host.main')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4 text-dark">{{ $tournament->tournament_name }}</h3>
    <livewire:tournament-matches-table :tournamentModel='$tournament->id' />
</div>
@endsection
