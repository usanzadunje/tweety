<x-app>
    <h1 class="text-4xl text-blue-300 font-bold mb-10 text-center"><i class="fas fa-bell"></i> Notifications</h1>

    <div>
        @forelse($notifications as $notification)
            <x-single-notification :notification="$notification"/>
        @empty
            <p class="p-4 text-blue-400">No notifications yet.</p>
        @endforelse
    </div>

</x-app>