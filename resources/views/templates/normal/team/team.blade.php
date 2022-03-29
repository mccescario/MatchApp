@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Teams (Static)</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">View Teams</p>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;
                        <select class="d-inline-block form-select form-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">
                    <button  class="btn btn-info btn-sm float-end mb-3 add-row" type="button" data-toggle="modal" data-target="#exampleModal"    style="margin: 0px;width: 170px;background: rgb(78,115,223);border-color: rgb(78,115,223);color: var(--bs-gray-300);margin-right: 5px;">
                        <i class="fas fa-plus"></i>
                        <strong>&nbsp;Create Team</strong>
                    </button>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th style="width: 400px;">Name</th>
                            <th style="width: 100px;">Type</th>
                            <th style="width: 150px;">Game</th>
                            <th style="width: 100px;">Members</th>
                            <th style="width: 220px;">Representative</th>
                            <th style="width: 120px;">Date Created</th>
                            <th  style="width: 120px;">Join</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                        <tr>
                            <td style="width: 264.828px;">
                                <a href="{{ route('player-team',$team->team_id) }}">{{ $team->team_name }}</a>
                            </td>
                            <td>Sports</td>
                            <td>Basketball</td>
                            <td>13</td>
                            <td>{{ $team->firstname }} {{ $team->lastname }}</td>
                            <td>{{ $team->created_at }}</td>
                            <td>
                                @if(isset($team->tournament_name))
                                <strong>{{ $team->tournament_name }}</strong><br><span class="btn btn-sm btn-warning">{{ $team->status }}</span>
                                @else
                                <a class="btn btn-sm btn-dark m-0 shadow " href="/player-tournament">Tournament list</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Type</strong></td>
                            <td><strong>Game</strong></td>
                            <td><strong>Members</strong></td>
                            <td><strong>Representative</strong></td>
                            <td><strong>Date Created</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <div class="text-center">
                <h4 class="text-dark mb-4" style="height: 50px;font-weight: bold;width: 450px;">Create Team</h4>
            </div>
            <form class="user" method="POST" action="{{url('store-team')}}">
                @csrf
                <div class="row mb-3" style="margin-top: -50px;">
                    <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 35px;">
                        <input class="form-control form-control-user" type="text" id="Team_Name" placeholder="Team Name" name="team_name" style="width: 450px;height: 50px;border-radius: 10px;margin-bottom: 15px;">
                        <select class="form-select" name="olympic_category_id" style="height: 50px;padding-top: 3px;padding-bottom: 3px;font-size: 12px;width: 450px;border-radius: 10px;">
                            <option value="0" selected="">Select a Game Category</option>
                            <option value="1">Sport</option>
                            <option value="2">eSport</option>
                        </select>

                        <select class="form-select" name="team_game_id" style="height: 50px;padding-top: 3px;padding-bottom: 3px;font-size: 12px;width: 450px;border-radius: 10px;margin-top: 16px;">
                            <option value="0" selected="">Select a Sport</option>
                            <option value="1">Test 1</option>
                            <option value="2">Test 2</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3"></div>
                <div class="text-center"></div><button class="btn btn-primary d-block btn-user" type="submit" style="margin-top: 25px;width: 150px;margin-left: 300px;"><i class="fas fa-users-cog" style="margin-right: 10px;"></i>Create Team</button>
                <div class="text-center"></div>
            </form>

        </div>

      </div>
    </div>
</div>

@endsection
