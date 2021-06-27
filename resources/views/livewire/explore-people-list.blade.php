<div class="pt-1">
    <div class="flex justify-center mb-10">
        <input wire:model="searchTerm" type="search" class="border-2 border-blue-300 w-full h-10 rounded-full px-4 py-1">
    </div>
    @foreach($users as $user)
        <div class="flex justify-between">
            <a href="{{ $user->path() }}">
                <div class="flex">
                    <img
                            src="{{ $user->avatar }}"
                            alt="{{ $user->name }} avatar"
                            width="60"
                            class="mr-4 rounded"
                    >

                    <div>
                        <h4 class="font-bold mt-4">{{ '@' . $user->name }}</h4>
                        <p class="break-all">
                            {{ \Illuminate\Support\Str::limit($user->bio, 70, '...') }}
                        </p>
                    </div>
                </div>
            </a>

            <div class="mt-4">
                @livewire('follow-button', ['followedUser' => $user], key($user->id))
            </div>
        </div>

        <hr class="m-auto my-4 border-b border-blue-300" width="98%">

    @endforeach
</div>