<x-app>
    <header class="mb-6">
        <div class="relative">

            <img
                    src="{{ $user->banner }}"
                    alt="Default banner"
                    style="height: 220px; width: 100%; border-radius: 9%;"
                    class="mb-2"
            >

            <img
                    src="{{ $user->avatar }}"
                    alt=""
                    class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                    style="left: 50%"
                    width="150"
            >

        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>

            <div class="flex">

                @can('edit', $user)

                    <a
                            href="{{ $user->path('edit') }}"
                            class="rounded-full border border-blue-400 py-2 px-4 text-black text-xs mr-2">

                        Edit Profile

                    </a>

                @endcan

                    @if( (current_user()->isNot($user)) )
                        @livewire('follow-button', ['followedUser' => $user])
                    @endif

            </div>
        </div>

        <p class="text-sm mb-5">
            {{ $user->bio }}
        </p>


        <div class="flex items-center">
            <span class="font-bold mr-2">{{ $user->followers() ?? 0 }}</span>
            <p class="text-gray-500">Followers</p>
            <span class="font-bold ml-8 mr-2">{{ $user->followings() }}</span>
            <p class="text-gray-500">Following</p>
        </div>
    </header>
    @include('timeline', [
    'tweets' => $tweets])
</x-app>