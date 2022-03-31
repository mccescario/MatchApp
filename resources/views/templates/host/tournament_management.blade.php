@extends('templates.host.main')

@section('content')

    <div class="container-fluid"> <!--tournament body start-->
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
              <button class="btn btn-info btn-sm float-end mb-3 add-row" onclick="document.location='{{ url('register-tournament') }}'" type="button" style="margin: 0px;width: 170px;background: rgb(78,115,223);border-color: rgb(78,115,223);color: var(--bs-gray-300);">
                <i class="fas fa-plus"></i><strong>&nbsp;Add Tournament</strong>
              </button>
                <p class="text-primary m-0 fw-bold" style="width: 978px;">List of Tournaments </p>

            </div>
            <div class="card-body">
            <a href="/bracket?data=tournament&type=generator" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-code-branch" style="width: 20px;"></i>&nbsp;Generate Bracket</a>
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                    <option value="10" selected="">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>&nbsp;</label></div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="background: transparent;color: rgb(133,135,150);height: 50px;">Tournament Name</th>
                                <th style="background: transparent;color: rgb(133,135,150);">Type</th>
                                <th style="background: transparent;color: rgb(133,135,150);">Game</th>
                                <th style="background: transparent;color: rgb(133,135,150);">Size</th>
                                <th style="background: transparent;color: rgb(133,135,150);height: 25px;">Format</th>
                                <th style="background: transparent;color: rgb(133,135,150);">Schedule</th>
                                <th class="text-center" style="background: transparent;color: rgb(133,135,150);">Delete</th>
                            </tr>
                        </thead>
                    @if (count($tournaments) > 0)
                        <tbody>
                            @foreach ($tournaments as $tournament)

                            <tr>

                                <td><a href="{{ route('tournament.show',$tournament->id) }}">{{ $tournament->tournament_name }}</a></td>
                                <td>
                                    @if ($tournament->tournament_sport_type == 1)
                                        Sports
                                    @elseif ($tournament->tournament_sport_type == 2)
                                        eSports
                                    @endif
                                </td>
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
                                <td>
                                    @if ($tournament->tournament_format == 1)
                                        Single - Elimination
                                    @elseif ($tournament->tournament_format == 2)
                                        Double - Elimination
                                    @elseif ($tournament->tournament_format == 3)
                                        Round - Robin Elimination
                                    @endif
                                </td>
                                <td> {{$tournament->tournament_date_from }} - {{$tournament->tournament_date_to }} </td>

                                <td class="text-center align-middle">
                                    <form action="{{ route('tournament.destroy',$tournament->id)}} " method="POST">
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" role="button" style="margin: 0px;margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#delete-modal" href="#">
                                        <i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i></button>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 30</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

