@extends('templates.normal.main')

@section('content')


<div class="card shadow col-9">
    <h3 class="text-dark mb-4 color-green card-header" >Team Profile -<strong> In Progress</strong></h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="card-body" method="POST" action="{{ route('profilemanagement.update', Auth::user()->id) }}">
        @csrf
        @method('PUT')


            <div class="col-lg">
                <div class="row">
                    <div class="col">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for=""><strong>Team Name :</strong></label>
                                                <input class="form-control" type="text" readonly id="" placeholder="{{$team->team_name}}" name="">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="address"><strong>Members :</strong></label>
                                                <div class="table-responsive table mt-2 card p-3 shadow rounded" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                                    <table class="table my-0" id="dataTable">

                                                        <thead>



                                                            <tr>
                                                                <th>No.</th>
                                                                <th>IGN</th>
                                                                <th>Name</th>
                                                                <th>Role / Position</th>


                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            @foreach ($members as $member)

                                                                        <tr>

                                                                            <td>{{ ++$i }}</td>
                                                                            <td>{{ $member->ign }}</td>
                                                                            <td>{{ $member->name }}</td>
                                                                            <td>{{ $member->position }}</td>


                                                                            <td>
                                                                                <form action="#" method="POST">

                                                                                    @method('DELETE')
                                                                                    @csrf


                                                                                    <button type="submit" class="btn btn-bg">Remove</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>

                                                            @endforeach


                                                        </tbody>




                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col ">
                                            <div class="mb-3">
                                                <label class="form-label" for="team_logo"><strong>Team Logo:</strong></label>

                                            </div>
                                            <div>
                                                <img class="img-thumbnail border" src="https://us.123rf.com/450wm/deskcube/deskcube1605/deskcube160500012/56118815-people-group-teaming-logo-vector-graphic-design-illustration.jpg?ver=6" alt="" style="h: 200px">
                                            </div>

                                            <div class="mb-3"></div>

                                            <div class="mb-3 d-flex align-items-end flex-column">
                                                <button class="btn btn-bg p-2 px-4 shadow mt-auto " type="submit"> <strong>Leave Team</strong> </button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3"></div>
                            </div>
                        </div>



                    </div>
                </div>







    </form>
    </div>

@endsection
