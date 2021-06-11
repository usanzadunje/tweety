<x-app>
    <div>
        @livewire('publish-tweet')

        @livewire('timeline', ['tweets' => $tweets])
    </div>
</x-app>
