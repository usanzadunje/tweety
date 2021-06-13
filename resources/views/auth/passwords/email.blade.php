<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">Forgot Password</x-slot>

            @if(session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3"
                     role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        {{ __('E-Mail Address') }}
                    </label>

                    <input class="border border-blue-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           autocomplete="email"
                           autofocus
                           value="{{ old('email') }}"
                           required
                    >

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>
