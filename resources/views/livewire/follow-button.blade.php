<div>
    <button
            wire:click="follow"
            class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs mr-1"
    >
        {{ auth()->user()->following($followedUser) ? 'Unfollow me' : 'Follow me' }}
    </button>
</div>