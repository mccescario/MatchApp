<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if (Route::has('login'))
                <div class="text-center mx-2">
                    @auth

                        <a href="{{ url('/dashboard') }}" class=" btn text-sm dark:text-gray-500 ">Already Logged-in</a>
                    @else
                        <x-jet-button>
                            <a href="{{ route('login') }}" class="text-sm dark:text-gray-500 ">Log in</a>
                        </x-jet-button>

                        @if (Route::has('register'))
                        <x-jet-button>
                            <a href="{{ route('register') }}" class="text-sm text-green-700 dark:text-gray-500">Register</a>
                        </x-jet-button>

                        @endif
                    @endauth


                </div>
            @endif

    </x-jet-authentication-card>
</x-guest-layout>
