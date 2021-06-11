<div class="border border-blue-100 rounded-lg">
    @forelse($tweets as $tweet)
        @include('single-tweet')
    @empty
        <p class="p-4 text-blue-400">No tweets yet.</p>
    @endforelse

    {{ $tweets->links() }}

</div>