<x-app>
    <div>
        @livewire('card', ['title' => 'Your most liked tweet', 'analyticsFor' => 'self', 'cardType' => 'tweet'])
        @livewire('card', ['title' => 'Most liked tweet on platform', 'analyticsFor' => 'global', 'cardType' => 'tweet'])
        @livewire('card', ['title' => 'Most followed person', 'analyticsFor' => 'global', 'cardType' => 'person'])
    </div>
</x-app>