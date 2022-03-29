@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header py-3" style="height: 64px;">
                    <p class="text-primary m-0 fw-bold" style="width: 978px;">Team Members</p>
                </div>
                <div class="card-body" style="margin-top: -15px;"><br>
                    
                    <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 500px;">Name</th>
                                    <th style="width: 170px;">Birth Date</th>
                                    <th style="width: 150px;">Course</th>
                                    <th style="width: 170px;">Message</th>
                                    <th style="width: 170px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($team_invites as $team_invite)
                                <tr>
                                    <td style="width: 264.828px;">{{$team_invite->user->firstname}} {{$team_invite->user->lastname}}</td>
                                    <td>{{$team_invite->user->birthdate}}</td>
                                    <td>{{$team_invite->user->course}}</td>
                                    <td>{{$team_invite->invite_message}}</td>
                                    <td><a href="">JOIN</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 500px;">Name</th>
                                    <th style="width: 170px;">Birth Date</th>
                                    <th style="width: 150px;">Course</th>
                                    <th style="width: 170px;">Role/Position</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite" style="margin-bottom: 0px;color: rgb(78,115,223);">Team Representative: Marthen Christ C. Escario</p>
                            <p id="dataTable_info-2" class="dataTables_info" role="status" aria-live="polite" style="margin-bottom: 0px;color: rgb(78,115,223);">Game Category: Sports</p>
                            <p id="dataTable_info-1" class="dataTables_info" role="status" aria-live="polite" style="color: rgb(78,115,223);">Game Type: Basketball</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
