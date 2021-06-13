<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">Reset Password</x-slot>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

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

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                        {{ __('Password') }}
                    </label>

                    <input class="border border-blue-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                           required
                    >

                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password-confirm"
                    >
                        {{ __('Confirm Password') }}
                    </label>

                    <input class="border border-blue-400 p-2 w-full"
                           type="password"
                           name="password_confirmation"
                           id="password-confirm"
                           autocomplete="new-password"
                           required
                    >

                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>
