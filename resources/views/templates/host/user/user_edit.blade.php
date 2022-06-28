@extends('templates.host.main')

@section('content')
    <div>
        <h1 style="padding: 20px 0px;">Edit User Details</h1>
    </div>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-bg mb-3 shadow"> Back</a>
    </div>

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

    <div class="container">

        <form method="POST" action="{{ route('usermanagement.update',$user->id) }}" x-data="{ role: 3, sport_type: 0 }">
            @csrf
            @method('PUT')
        <div class="row card shadow mb-3">
            <div class="card-header py-3 mb-3">
                    <h5 class="color-green m-0 fw-bold">User Profile</h5>
            </div>
            <div class="row px-4 card-body" >
            <div class="col-4 ">


                    <div class="mb-3">
                        <label class="form-label" for="name">Name :</label>
                        <x-jet-input placeholder="{{ $user->name }}" id="name" class="block form-control mt-1 w-full rounded " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email :</label>
                        <x-jet-input placeholder="{{ $user->email }}" id="email" class="block form-control mt-1 w-full rounded " type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password" >Password</label>
                        <x-jet-input placeholder="************" id="password" class="block form-control mt-1 w-full rounded " type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password_confirmation" >Confirm Password</label>
                        <x-jet-input placeholder="************" id="password_confirmation" class="block form-control mt-1 w-full rounded " type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="address">Address:</label>
                        <x-jet-input placeholder="{{ $user->address }}" id="address" class="block form-control mt-1 w-full rounded " type="text" name="address" :value="old('address')" aria-required="" autocomplete="address" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status">Civil Status:</label>
                        <select name="status"  class="block form-control mt-1 w-full rounded  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="1">Single</option>
                            <option value="2">Married</option>
                            <option value="3">Widowed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="contact_number">Contact Number :</label>
                        <x-jet-input placeholder="{{ $user->contact_number }}" id="contact_number" class="block form-control mt-1 w-full rounded " type="text" name="contact_number" :value="old('contact_number')" aria-required="" autocomplete="contact_number" />
                    </div>

                    <div class="mb-3" >
                        <label class="form-label" for="sport_type">Sport type :</label>
                        <select name="sport_type" x-model="sport_type" class="block form-control mt-1 w-full  rounded border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="0">Select Sport Type</option>
                            <option value="1">Sport</option>
                            <option value="2">E-Sport</option>
                        </select>
                    </div>

                    <div class="mb-3" x-show="sport_type == 1">
                        <label class="form-label" for="sport">Sport:</label>
                        <select name="sport" class="block form-control mt-1 w-full rounded  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="1">Basketball</option>
                            <option value="2">Volleyball</option>
                        </select>
                    </div>

                    <div class="mb-3" x-show="sport_type == 2">
                        <label class="form-label" for="esport">E-Sport:</label>
                        <select name="esport" class="block form-control mt-1 w-full rounded  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="1">LoL - League of Legends</option>
                            <option value="2">DotA 2 - Defense of the Ancients 2</option>
                        </select>
                    </div>
                </div>

            <div class="row items-center mb-3">
                <div class="flex  justify-end mt-4">
                    <button class="btn btn-bg" type="submit" >Save Changes</button>

                </div>
            </div>
            </div>
        </div>

    </div>
        </form>
        </div>

    </div>


@endsection
