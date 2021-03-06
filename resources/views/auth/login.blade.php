<x-master>
    <div class="container mx-auto w-1/5">
        <x-panel>
            <div class="w-full">
                <x-slot name="heading">Login</x-slot>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Email
                        </label>

                        <input
                                type="email"
                                class="border border-blue-400 p-2 w-full"
                                id="email"
                                name="email"
                                autocomplete="email"
                                value="{{ old('email') }}"
                                required
                        >

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Password
                        </label>

                        <input
                                type="password"
                                class="border border-blue-400 p-2 w-full"
                                id="password"
                                name="password"
                                autocomplete="current-password"
                                required
                        >

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <div class="flex justify-between">
                            <div>
                                <input
                                        type="checkbox"
                                        class="mr-1"
                                        id="remember"
                                        name="remember"
                                        {{ old('remember') ? 'checked' : ''}}
                                >

                                <label for="remember" class="text-xs text-gray-700 font-bold uppercase">
                                    Remember me?
                                </label>
                            </div>

                            <a
                                    href="{{ route('password.request') }}"
                                    class="text-xs text-gray-700 font-bold mt-1"
                            >
                                Forgot your password?
                            </a>
                        </div>

                        @error('remember')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <button
                                type="submit"
                                class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700 mr-2"
                        >
                            LOGIN
                        </button>
                    </div>
                </form>
            </div>
        </x-panel>
    </div>
</x-master>