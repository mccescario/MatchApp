@extends('templates.normal.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">{{$team->team_name}}</h3>
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header py-3" style="height: 64px;">
                    <p class="text-primary m-0 fw-bold" style="width: 978px;">Team Members</p>
                </div>
                <div class="card-body" style="margin-top: -15px;"><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add member
                    </button>
                    <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 500px;">Name</th>
                                    <th style="width: 170px;">Birth Date</th>
                                    <th style="width: 150px;">Course</th>
                                    <th style="width: 170px;">Role/Position</th>
                                    <th style="width: 170px;">Invite Message</th>
                                    <th style="width: 170px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($team->team_invitations as $invite)
                                <tr>
                                    <td style="width: 264.828px;">{{$invite->user->firstname}} {{$invite->user->lastname}}</td>
                                    <td>{{$invite->user->birthdate}}</td>
                                    <td>{{$invite->user->course}}</td>
                                    <td></td>
                                    <td>{{$invite->invite_message}}</td>
                                    <td>{{$invite->invite_status}}</td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" method="POST" action="{{url('add-member-team')}}">
            @csrf
            <div class="row mb-3" style="margin-top: -50px;">
                <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 35px;">
                    <input class="form-control form-control-user" type="hidden" name="team_id" value="{{ request()->id }}" style="width: 450px;height: 50px;border-radius: 10px;margin-bottom: 15px;">
                    <input class="form-control form-control-user" type="hidden" name="invite_status" value="SENT INVITE" style="width: 450px;height: 50px;border-radius: 10px;margin-bottom: 15px;">
                    <label>Select player/user<label>
                    <select class="form-select" name="user_id" style="height: 50px;padding-top: 3px;padding-bottom: 3px;font-size: 12px;width: 450px;border-radius: 10px;">
                        <option value="0" selected="">Select a User to add to the team</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->course}}: {{$user->firstname}} {{$user->lastname}}</option>
                        @endforeach
                    </select>
                    <label>Leave a message<label>
                    <input class="form-control form-control-user" type="text" name="invite_message" placeholder="Invite message" value="" style="width: 450px;height: 50px;border-radius: 10px;margin-bottom: 15px;">

                </div>
            </div>
            <div class="mb-3"></div>
            <div class="text-center"></div><button class="btn btn-primary d-block btn-user" type="submit" style="margin-top: 25px;width: 150px;margin-left: 300px;"><i class="fas fa-users-cog" style="margin-right: 10px;"></i>Send Invitation</button>
            <div class="text-center"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
