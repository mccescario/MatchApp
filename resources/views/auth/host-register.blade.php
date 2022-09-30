@extends('platform::auth')

@section('content')
<form action="{{ route('user.registration.host.store') }}" method="POST">
    @csrf
    <div class="mb-3">

        <label class="form-label">
            {{__('First Name')}}
        </label>

        {!! \Orchid\Screen\Fields\Input::make('first_name')
        ->type('text')
        ->required()
        ->tabindex(1)
        !!}
    </div>

    <div class="mb-3">

        <label class="form-label">
            {{__('Last Name')}}
        </label>

        {!! \Orchid\Screen\Fields\Input::make('last_name')
        ->type('text')
        ->required()
        ->tabindex(2)
        !!}
    </div>

    <div class="mb-3">

        <label class="form-label">
            {{__('Email address')}}
        </label>

        {!! \Orchid\Screen\Fields\Input::make('email')
        ->type('email')
        ->required()
        ->tabindex(3)
        ->autofocus()
        ->placeholder(__('Enter your email'))
        !!}
    </div>

    <div class="mb-3">
        <label class="form-label w-100">
            {{__('Password')}}
        </label>

        {!! \Orchid\Screen\Fields\Password::make('password')
        ->required()
        ->tabindex(4)
        ->placeholder(__('Enter your password'))
        !!}
    </div>

    <div class="mb-3">
        <label class="form-label w-100">
            {{__('Confirm Password')}}
        </label>

        {!! \Orchid\Screen\Fields\Password::make('password_confirmation')
        ->required()
        ->tabindex(5)
        ->placeholder(__('Enter your password'))
        !!}
    </div>

    <div class="mb-3">

        <label class="form-label">
            {{__('Date of Birth')}}
        </label>

        {!! \Orchid\Screen\Fields\DateTimer::make('date_of_birth')
        // ->format('m-d-Y')
        ->tabindex(6)
        !!}
    </div>

    <div class="mb-3">

        <label class="form-label">
            {{__('Gender')}}
        </label>

        {!! \Orchid\Screen\Fields\Select::make('gender')
        ->options([
        'male' => 'Male',
        'female' => 'Female',
        ])
        ->tabIndex(7)
        !!}
    </div>

    <div class="mb-3">

        <label class="form-label">
            {{__('Contact Number')}}
        </label>

        {!! \Orchid\Screen\Fields\Input::make('contact_number')
        ->type('text')
        ->tabindex(8)
        !!}
    </div>

    <div class="row align-items-center">
        <div class="col-md-6 col-xs-12">

        </div>
        <div class="col-md-6 col-xs-12">
            <button id="button-login" type="submit" class="btn btn-default btn-block" tabindex="3">
                <x-orchid-icon path="login" class="small me-2" />
                {{__('Register')}}
            </button>
        </div>
    </div>

</form>
@endsection
