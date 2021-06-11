<x-app>
        <h1 class="text-xl font-bold mb-10">Notifications</h1>

        <div class="border border-blue-100 rounded-lg">
            @forelse($notifications as $notification)
                    <x-single-notification :notification="$notification"/>
            @empty
                    <p class="p-4 text-blue-400">No notifications yet.</p>
            @endforelse
        </div>

</x-app>