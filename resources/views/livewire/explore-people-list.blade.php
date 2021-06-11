<div>
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
                    </div>
                </div>
            </a>

            <div class="mt-4">
                @livewire('follow-button', ['followedUser' => $user], key($user->id))
            </div>
        </div>

        {!! $loop->last ? '' : '<hr class="m-auto my-4 border-b border-blue-300" width="98%">' !!}

    @endforeach
</div>