<div class="border border-blue-100 rounded-lg">
    @forelse($tweets as $tweet)
        @livewire('single-tweet', ['tweet' => $tweet], key($tweet->id))

        {!! $loop->last ? '' : '<hr class="m-auto my-4 border-b border-blue-300" width="93%">' !!}
    @empty
        <p class="p-4 text-blue-400">No tweets yet.</p>
    @endforelse

    {{ $tweets->links() }}

</div>