@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Tournaments</h3>
    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="table-responsive" id="myTable">
                        <table class="table table-striped table-sm table-bordered">
                            <thead>
                                <tr></tr>
                            </thead>
                            <tbody>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="card shadow">
        <div class="card-header py-3" style="height: 64px;">
            <p class=" green-color-text m-0 fw-bold" style="width: 978px;">List of Tournaments</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th class="green-color-text" style="height: 50px;width: 250px;">Tournament Name</th>
                            <th class="green-color-text" style="width: 125px;">Type</th>
                            <th class="green-color-text" style=";width: 200px;">Game</th>
                            <th class="green-color-text" style="width: 75px;">Size</th>
                            <th class="green-color-text" style="height: 25px;width: 150px;">Format</th>
                            <th class="green-color-text" style="width: 100px;">Schedule</th>
                            <th class="green-color-text" style="width: 95px;">Slot</th>
                            <th class="green-color-text" style="width: 95px;">Action</th>
                        </tr>
                    </thead>
                    @if (count($tournaments) > 0)
                    <tbody>
                        @foreach ($tournaments as $tournament)
                        <tr>

                            <td>{{ $tournament->tournament_name }}</td>
                            <td>@if ($tournament->tournament_sport_type == 1)
                                Sports
                            @elseif ($tournament->tournament_sport_type == 2)
                                eSports
                            @endif</td>
                            <td>
                                @if ($tournament->tournament_sport_type == 1)
                                        @if ($tournament->tournament_sport == 1)
                                            Basketball
                                        @elseif ($tournament->tournament_sport == 2)
                                            Volleyaball
                                        @elseif ($tournament->tournament_sport == 3)
                                            Football
                                        @endif
                                    @elseif ($tournament->tournament_sport_type == 2)
                                        @if ($tournament->tournament_esport == 1)
                                            Valorant
                                        @elseif ($tournament->tournament_esport == 2)
                                            Mobile Legends
                                        @elseif ($tournament->tournament_esport == 3)
                                            Dota 2
                                        @elseif ($tournament->tournament_esport == 4)
                                            Counter Strike: Global Offensive
                                        @elseif ($tournament->tournament_esport == 5)
                                            League of Legends
                                        @elseif ($tournament->tournament_esport == 6)
                                            Call of Duty: Mobile
                                        @endif
                                    @endif
                            </td>
                            <td>
                                @if ($tournament->tournament_size == 1)
                                    2
                                @elseif ($tournament->tournament_size == 2)
                                    4
                                @elseif ($tournament->tournament_size == 3)
                                    8
                                @elseif ($tournament->tournament_size == 4)
                                    16
                                @elseif ($tournament->tournament_size == 5)
                                    32
                                @elseif ($tournament->tournament_size == 6)
                                    64
                                @elseif ($tournament->tournament_size == 7)
                                    128
                                @endif
                            </td>
                            <td>@if ($tournament->tournament_format == 1)
                                    Single - Elimination
                                @elseif ($tournament->tournament_format == 2)
                                    Double - Elimination
                                @elseif ($tournament->tournament_format == 3)
                                    Round- Robin Elimination
                                @endif
                            </td>
                            <td> <b> From:</b> <br>{{ $tournament->tournament_date_from }} <br>
                                 <b>To:</b> <br>{{ $tournament->tournament_date_to }} </td>
                            <td>2/16


                            </td>
                            <td>
                                
                                <a class="btn btn-sm bg-purple" style="color: #fff;" href="{{ route('join.tournament', $tournament->id) }}">Join</a>
                                
                            </td>
                        </tr>

                        @endforeach
                    @else
                        <h3>No Records Available!</h3>
                        <hr>
                    @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Tournament Name</strong></td>
                            <td><strong>Type</strong></td>
                            <td><strong>Game</strong></td>
                            <td><strong>Size</strong></td>
                            <td><strong>Format</strong></td>
                            <td><strong>Schedule</strong></td>
                            <td><strong>Slot</strong></td>
                            <td><strong>Action</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
</div>

@endsection
