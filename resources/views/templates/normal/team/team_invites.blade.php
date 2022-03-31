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
                                    <th style="width: 500px;">Team Name</th>
                                    <th style="width: 170px;">Message</th>
                                    <th style="width: 170px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($team_invites as $team_invite)
                                <tr>
                                    <td style="width: 264.828px;">{{$team_invite->team->team_name}}</td>
                                    <td>{{$team_invite->recruite_message}}</td>
                                    <td>
                                        @if(is_null($team_invite->status))
                                            <a class="btn btn-primary btn-sm" href="{{url('join_invite/'.$team_invite->id.'/1')}}" role="button" >Accept</a>
                                            <a class="btn btn-danger btn-sm" href="{{url('join_invite/'.$team_invite->id.'/2')}}" role="button" >Reject</a>
                                        @else
                                            <a class="btn btn-primary disabled" href="#" role="button" >Responded</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 500px;">Team Name</th>
                                    <th style="width: 170px;">Role/Position</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
