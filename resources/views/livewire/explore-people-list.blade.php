<div class="pt-10">
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