<div>
    @forelse($tweets as $tweet)
        @livewire('single-tweet', ['tweet' => $tweet], key($tweet->id))

        {!! $loop->last ? '' : '<hr class="m-auto mt-4 border-b border-blue-300" width="93%">' !!}
    @empty
        <p class="p-4 text-blue-400">No tweets yet.</p>
    @endforelse

    {{ $tweets->links() }}

</div>