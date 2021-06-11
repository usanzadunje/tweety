@if( (current_user()->isNot($user)) )
    <form method="POST" action="{{ route('profiles.store', ['user' => $user]) }}">
        @csrf
        <button
                type="submit"
                class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs mr-1"
        >
            {{ auth()->user()->following($user) ? 'Unfollow me' : 'Follow me' }}
        </button>
    </form>
@endif