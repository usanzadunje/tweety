<ul>
    <li>
        <a
                class="font-bold text-lg mb-4 block hover:text-blue-300"
                href="{{route('home')}}"
        >Home
        </a>
    </li>
    <li>
        <a
                class="font-bold text-lg mb-4 block hover:text-blue-300"
                href="/explore"
        >Explore
        </a>
    </li>
    <li>
        <a
                class="font-bold text-lg mb-4 block hover:text-blue-300"
                href="/notifications"
        >Notifications
        </a>
    </li>
    <li>
        <a
                class="font-bold text-lg mb-4 block hover:text-blue-300"
                href="{{route('profile', auth()->user())}}"
        >Profile
        </a>
    </li>
    <li>
        <a
                class="font-bold text-lg mb-4 block hover:text-blue-300"
                href="{{ '#' }}"
        >General
        </a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf

            <button class="font-bold text-lg  hover:text-blue-300">
                Logout
            </button>

        </form>
    </li>
</ul>
