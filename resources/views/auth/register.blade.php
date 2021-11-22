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
