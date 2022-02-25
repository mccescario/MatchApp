@extends('templates.host.main')

@section('content')

    <div>
        <h1 style="padding: 20px 0px;">Tournament Management</h1>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif


    <a href='{{ url("register-tournament") }}' class="text-decoration-none btn btn-bg shadow"  >Add Tournament</a>


    <div class="table-responsive table mt-2 shadow border p-3 rounded" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
        <table class="table my-0" id="dataTable">
            @if (count($tournaments) > 0)
            <thead>
                <tr>
                    <th></th>
                    <th>Tournament Name</th>
                    <th>Sport / E-Sport</th>
                    <th>Sport Type</th>
                    <th>Bracket Type</th>
                    <th>Starting Date</th>
                    <th>Date Created<br></th>
                    <th>Tournament Fee</th>
                </tr>
            </thead>
            <tbody>


                    @foreach ($tournaments as $tournament)
                        <tr>

                            <td>{{ ++$i }}</td>
                            <td>{{ $tournament->tournament_name }}</td>

                            <td>
                                @if ($tournament->tournament_sport_type == 1)
                                    Sports
                                @elseif ($tournament->tournament_sport_type == 2)
                                    E-sports
                                @endif
                            </td>

                            <td>

                                @if ($tournament->tournament_sport_type == 1)
                                    @if ($tournament->tournament_sport == 1)
                                        Basketball
                                    @elseif ($tournament->tournament_sport == 2)
                                        Volleyaball
                                    @endif
                                @elseif ($tournament->tournament_sport_type == 2)
                                    @if ($tournament->tournament_esport == 1)
                                        Lol
                                    @elseif ($tournament->tournament_esport == 2)
                                        Dota
                                    @endif
                                @endif


                            </td>
                            <td>

                                @if ($tournament->tournament_bracket == 1)
                                    Single - Elimination
                                @elseif ($tournament->tournament_bracket == 2)
                                    Double - Elimination
                                @elseif ($tournament->tournament_bracket == 3)
                                    Round - Robin Elimination
                                @endif

                            </td>
                            <td>{{ $tournament->tournament_date }}</td>
                            <td>{{ $tournament->created_at }}</td>
                            <td>
                                @if ($tournament->tournament_fee == 1)
                                    Have - Php{{$tournament->tournament_price}}
                                @else
                                    None
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('tournament.destroy',$tournament->id) }}" method="POST">

                                    @method('DELETE')
                                    @csrf

                                    <a class="btn btn-bg-inverse" href="{{ route('tournament.show',$tournament->id) }}">Details</a>

                                    <a class="btn btn-bg" href="{{ route('tournament.edit',$tournament->id) }}">Edit</a>





                                    <button type="submit" class="btn btn-bg-inverse">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach



            </tbody>

            @else
                <h3>No Records Available!</h3>
                <hr>
            @endif


        </table>
        <div class="m-2">
            {!! $tournaments->links() !!}
        </div>
    </div>

@endsection


