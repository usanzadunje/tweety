<div>
    <div class="flex p-4 justify-between">
        <div class="flex">
            <div class="mr-4 flex-shrink-0">
                <a href="{{route('profile', $tweet->user)}}">
                    <img
                            src="{{$tweet->user->avatar}}"
                            alt=""
                            class="rounded-full mr-2"
                            width="50px"
                            height="50px"
                    >
                </a>
            </div>

            <div>
                <h5 class="font-bold mb-3">
                    <a href="{{route('profile', $tweet->user)}}">
                        {{$tweet->user->name}}
                    </a>
                </h5>

                <p class="text-sm mb-3">
                    {{$tweet->body}}
                </p>

                @livewire('like-buttons', ['tweet' => $tweet])

            </div>
        </div>
        <div>
            @can('delete', $tweet)
                @livewire('delete-tweet-button', ['tweet' => $tweet])
            @endcan
        </div>
    </div>
</div>