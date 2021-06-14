<div class="bg-blue-200 rounded-lg py-4 w-56 fixed">
    <h3 class="font-bold text-2xl mb-4 text-center">Following</h3>

    <ul class="px-4">
        @forelse(auth()->user()->follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }} hover:font-bold">
                <div class="flex items-center text-lg">
                    <a href="{{route('profile', $user)}}">
                        <img
                                src="{{$user->avatar}}"
                                alt=""
                                class="rounded-full mr-2"
                                width="50px"
                                height="50px"
                        >
                    </a>


                    <a href="{{route('profile', $user)}}">
                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @empty
            <li>No friends yet.</li>
        @endforelse
    </ul>

    @if(session('new-tweet'))
        <div style="position:absolute;top:90vh;transform:translateY(-100%);width:230px;">
            <p class="rounded-lg text-white bg-blue-400 p-3">
                {{ session('new-tweet') }}
            </p>
        </div>
    @endif
</div>