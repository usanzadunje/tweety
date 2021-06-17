<x-app>
    <h1 class="text-4xl text-blue-300 font-bold mb-10 text-center"><i class="fas fa-chart-bar"></i> Analytics</h1>

    <div class="flex flex-wrap justify-center">
        @livewire('card', ['title' => 'Your most liked tweet', 'analyticsFor' => 'self', 'cardType' => 'tweet'])
        @livewire('card', ['title' => 'Most liked tweet on platform', 'analyticsFor' => 'global', 'cardType' => 'tweet'])
        @livewire('card', ['title' => 'Most followed person on platform', 'analyticsFor' => 'global', 'cardType' => 'person'])
    </div>
</x-app>