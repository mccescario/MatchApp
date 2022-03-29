<!DOCTYPE html>
<html style="background: var(--bs-gray-300);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','MatchApp') </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css'); }}">
    <link rel="stylesheet" href="{{ url('fonts/font-awesome.min.css'); }}">
    <link rel="stylesheet" href="{{ url('fonts/fontawesome5-overrides.min.css'); }}">
    <link rel="stylesheet" href="{{ url('css/Bold-BS4-Header-with-HTML5-Video-Background.css'); }}">
    <link rel="stylesheet" href="{{ url('css/Community-ChatComments.css'); }}">
    <link rel="stylesheet" href="{{ url('css/Form-Select---Full-Date---Month-Day-Year.css'); }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ url('css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css'); }}">
    <link rel="stylesheet" href="{{ url('css/newsfeed-post.css'); }}">
</head>

<body class="bg-gradient-primary" style="background: var(--bs-gray-300);">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex" style="background: #1b1b1b;"><img src="{{ asset('images/matchapp-icon.png') }}" style="height: 256px;width: 256px;margin: 124px;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4" style="height: 50px;">Create an Account!</h4>
                            </div>
                            <form class="user">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="First Name" name="first_name"></div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Last Name" name="last_name"></div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email"></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password"></div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat"></div>
                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #1b1b1b;">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small text-gray-600 hover:text-black-900" href="{{route('login')}}">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js')}}"></script>
    <script src="{{ asset('js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js')}}"></script>
    <script src="{{ asset('js/theme.js')}}"></script>
    <script src="{{ asset('js/Date-Range-Picker.js')}}"></script>
    <script src="{{ asset('js/DateRangePicker.js')}}"></script>
    <script src="{{ asset('js/Dynamically-Add-Remove-Table-Row.js')}}"></script>
</body>

</html>
{{--


<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{ role: 3, sport_type: 0 }">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Role:') }}" />
                <select name="role" x-model="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="2">Host</option>
                    <option value="3">Player</option>
                </select>
            </div>

            <div class="mt-4" x-show="role == 2">
                <x-jet-label for="host_key" value="{{ __('Host key:') }}" />
                <x-jet-input id="host_key" class="block mt-1 w-full" type="text" name="host_key" :value="old('host_key')" aria-required="" autocomplete="host_key" />
            </div>

            <div class="mt-4" x-show="role == 3">
                <x-jet-label for="address" value="{{ __('Address:') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" aria-required="" autocomplete="address" />
            </div>

            <div class="mt-4" x-show="role == 3">
                <x-jet-label for="status" value="{{ __('Civil Status:') }}" />
                <select name="status"  class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="1">Single</option>
                    <option value="2">Married</option>
                    <option value="3">Widowed</option>
                </select>
            </div>

            <div class="mt-4" x-show="role == 3">
                <x-jet-label for="contact_number" value="{{ __('Contact Number:') }}" />
                <x-jet-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" aria-required="" autocomplete="contact_number" />
            </div>

            <div class="mt-4" x-show="role == 3">
                <x-jet-label for="sport_type" value="{{ __('Sport type:') }}" />
                <select name="sport_type" x-model="sport_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="0">Select Sport Type</option>
                    <option value="1">Sport</option>
                    <option value="2">E-Sport</option>
                </select>
            </div>

            <div class="mt-4" x-show="sport_type == 1">
                <x-jet-label for="sport" value="{{ __('Sport:') }}" />
                <select name="sport" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="1">Basketball</option>
                    <option value="2">Volleyball</option>
                </select>
            </div>

            <div class="mt-4" x-show="sport_type == 2">
                <x-jet-label for="esport" value="{{ __('E-Sport:') }}" />
                <select name="esport" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="1">LoL - League of Legends</option>
                    <option value="2">DotA 2 - Defense of the Ancients 2</option>
                </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif


            <div class="flex items-center justify-end mt-4">

                 <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}
