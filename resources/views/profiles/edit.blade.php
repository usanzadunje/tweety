<x-app>

    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')


        <div class="mb-6">

            @livewire('banner-upload', ['user' => $user])

            @error('banner')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input
                    type="text"
                    class="border border-blue-300 p-2 w-full"
                    id="name"
                    name="name"
                    value="{{ $user->name }}"
                    required
            >

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Username
            </label>

            <input
                    type="text"
                    class="border border-blue-300 p-2 w-full"
                    id="username"
                    name="username"
                    value="{{ $user->username }}"
                    required
            >

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            @livewire('avatar-upload')
            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="bio" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Bio
            </label>

            <textarea
                    name="bio"
                    id="bio"
                    class="border border-blue-300 p-2 w-full"
                    style="outline:none; resize: none; overflow: hidden;"
                    onkeyup="textCounter(this,'counter',255);"
            >{{ $user->bio }}</textarea>
            <div class="flex justify-between">
                <div></div>

                <input class="font-bold text-sm text-blue-400" disabled maxlength="255" size="4" id="counter">
            </div>

            <script>
                function textCounter(field, field2, maxlimit) {
                    var countfield = document.getElementById(field2);
                    if(field.value.length > maxlimit) {
                        field.value = field.value.substring(0, maxlimit);
                        return false;
                    }else {
                        countfield.value = 0 + field.value.length + "/" + maxlimit;
                    }
                }
            </script>

            @error('bio')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input
                    type="email"
                    class="border border-blue-300 p-2 w-full"
                    id="email"
                    name="email"
                    value="{{ $user->email }}"
                    required
            >

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button
                type="button"
                class="hover:underline mb-6"
                onclick="showChangePassword('passwords')"
        >
            Change password
        </button>

        <div id='passwords' class="hidden">
            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Password
                </label>

                <input
                        type="password"
                        class="border border-blue-300 p-2 w-full"
                        id="password"
                        name="password"
                >

                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Password Confirmation
                </label>

                <input
                        type="password"
                        class="border border-blue-300 p-2 w-full"
                        id="password_confirmation"
                        name="password_confirmation"
                >

                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 rounded-lg shadow py-3 px-8 text-white text-lg mr-4"
            >
                Save
            </button>
            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>

    </form>
    <script>
        function showChangePassword(id) {
            var passwordsContainer = document.getElementById(id);
            passwordsContainer.classList.toggle('hidden');
        }
    </script>
</x-app>