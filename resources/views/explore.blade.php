<x-app>
    <h1 class="text-4xl text-blue-300 font-bold mb-10 text-center"><i class="fas fa-hashtag"></i> Explore</h1>

    @livewire('explore-people-list')

    {{ $users->links() }}
</x-app>