@extends('templates.host.main')

@section('content')

    <div>
        <h1 class="" style="padding: 20px 0px;">User Management</h1>
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


    <a href='{{ route('usermanagement.create') }}' class="text-decoration-none btn btn-bg shadow"  >Add User</a>


    <div class="table-responsive table mt-2 card p-3 shadow rounded" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
        <table class="table my-0" id="dataTable">
            @if (count($user) > 0)
            <thead>
                <tr>
                    <th></th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Sport / E-Sport</th>
                    <th>Sport</th>


                </tr>
            </thead>
            <tbody>
                    @foreach ($user as $users)
                        @if ($users->role > 2)
                            <tr>

                                <td>{{ ++$i }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->address }}</td>
                                <td>{{ $users->contact_number }}</td>
                                <td>{{ $users->email }}</td>
                                <td>
                                    @if ($users->sport_type == 1)
                                        SPORT
                                    @elseif ($users->sport_type == 2)
                                        E-SPORT
                                    @endif
                                </td>
                                <td>
                                    @if ($users->sport_type == 1)
                                        @if ($users->sport == 1)
                                            BasketBall
                                        @elseif ($users->sport == 2)
                                            Volleyball
                                        @endif

                                    @elseif ($users->sport_type == 2)
                                        @if ($users->esport == 1)
                                            League of Legends (LoL)
                                        @elseif ($users->esport == 2)
                                            Defense of the Ancients (DotA 2)
                                        @endif
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    <form action="{{ route('usermanagement.destroy',$users->id) }}" method="POST">

                                        @method('DELETE')
                                        @csrf

                                        <a class="btn btn-bg" href="{{ route('usermanagement.show',$users->id) }}">Details</a>

                                        <a class="btn btn-bg-inverse color-green" href="{{ route('usermanagement.edit',$users->id) }}">Edit</a>

                                        <button type="submit" class="btn btn-bg">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach



            </tbody>

            @else
                <h3>No Records Available!</h3>
                <hr>
            @endif
        </table>

        {!! $user->links() !!}
    </div>

@endsection


