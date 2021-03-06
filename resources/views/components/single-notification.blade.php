<div class="flex px-4 pb-4 justify-between">
    <div>
        <div class="mr-4 mb-2">
            <a href="{{ route('profile', $notification->user($notification->from_user_id)) }}">
                <img
                        src="{{ $notification->user($notification->from_user_id)->avatar }}"
                        alt=""
                        class="rounded-full mr-2"
                        width="50px"
                        height="50px"
                >
            </a>

        </div>

        @if($notification->type == 'follow')
            <div>
                <a href="{{ route('profile', $notification->user($notification->from_user_id)) }}">
                    <span class="mb-3 font-bold">
                            {{ '@' . $notification->user($notification->from_user_id)->username }}
                    </span>
                </a>
                <span>
                    just followed you.
                </span>
            </div>
        @else
            <div>
                <a href="{{ route('profile', $notification->user($notification->from_user_id)) }}">
                    <span class="mb-3 font-bold">
                            {{ '@' . $notification->user($notification->from_user_id)->username }}
                        </span>
                </a>
                <span>
                    just liked your tweet.
                </span>

                <p class="mt-2 text-sm text-gray-700">
                    {{ $notification->tweet($notification->tweet_id)->body }}
                </p>
            </div>
        @endif

    </div>
    <p class="text-sm text-blue-400 font-bold">{{$notification->created_at->diffForHumans()}}</p>

</div>
<hr class="m-auto mb-4 border-b border-blue-300" width="98%">
