@extends('templates.host.main')

@section('content')
    <div>
        <h1 style="padding: 20px 0px;">View User Details</h1>
    </div>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-bg-inverse mb-3 shadow"> Back</a>
    </div>

    <div class="container">

                <div class="row g-0">
                    <div class="col card shadow me-3">

                        <div class="card-header py-3">
                            <h5 class="color-green m-0 card-title">Player Details</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="ms-4 text-start card-title">
                                Full Name :  &nbsp;{{ $user->name }}</h6>
                            <h6 class="ms-4 text-start card-title">
                                E-Mail :&nbsp; {{ $user->email }}</h6>
                            <h6 class="ms-4 text-start card-title">
                                Address :</strong>&nbsp;{{ $user->address }} </h6>
                            <h6 class="ms-4 text-start card-title">
                                Contact Number :&nbsp;{{ $user->contact_number }} </h6>
                            <h6 class="ms-4 text-start card-title">
                                Civil Status :&nbsp;

                                @if ($user->status = 1)
                                    Single
                                @elseif ($user->status = 2)
                                    Married
                                @elseif ($user->status = 3)
                                    Widowed
                                @endif
                            </h6>
                        </div>


                    </div>


                    <div class="col card shadow">
                        <div class="card-header py-3 ">
                            <h5 class="color-green m-0 card-title ">Player Profile</h5>
                        </div>
                        <div class="mt-3 ms-4">
                            Player Profile Not Yet Updated

                        </div>


                    </div>
                </div>


    </div>


@endsection
