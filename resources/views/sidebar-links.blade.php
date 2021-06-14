<ul class="fixed text-xl placeholder">
    <li class="mb-2">
        <a href="{{ route('home') }}">
            <img src="{{asset('images/logo.jpeg')}}" alt="Tweety logo">
        </a>
    </li>
    <li class="ml-2">
        <a
                class="font-bold mb-4 block hover:text-blue-300"
                href="{{route('home')}}"
        >
            <i class="fas fa-home"></i>
            Home
        </a>
    </li>
    <li class="ml-2">
        <a
                class="font-bold mb-4 block hover:text-blue-300"
                href="/explore"
        >
            <i class="fas fa-hashtag"></i>
            Explore
        </a>
    </li>
    <li class="ml-2">
        <a
                class="font-bold mb-4 block hover:text-blue-300"
                href="/notifications"
        >
            <i class="fas fa-bell"></i>
            Notifications
        </a>
    </li>
    <li class="ml-2">
        <a
                class="font-bold mb-4 block hover:text-blue-300"
                href="{{route('profile', auth()->user())}}"
        >
            <i class="fas fa-user-cog"></i>
            Profile
        </a>
    </li>
    <li class="ml-2">
        <a
                class="font-bold mb-4 block hover:text-blue-300"
{{--                href="{{route('analytics')}}"--}}
        >
            <i class="fas fa-chart-bar"></i>
            Analytics
        </a>
    </li>
    <li class="ml-2">
        <form action="/logout" method="POST">
            @csrf

            <button class="font-bold hover:text-blue-300">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>

        </form>
    </li>
</ul>
