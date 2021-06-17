<div class="flex justify-between m-6">
    <div class="flex flex-col h-full max-w-lg mx-auto bg-gray-800 rounded-lg">
        <img
                class="rounded-lg rounded-b-none"
                src="http://www.3forty.media/ruki/wp-content/uploads/2020/06/meditation-yoga-1024x682.jpg"
                alt="thumbnail"
                loading="lazy"
        />
        <div class="flex justify-between -mt-4 px-4">
            <span
                    class="inline-block ring-4 bg-red-500 ring-gray-800 rounded-full text-sm font-medium tracking-wide text-gray-100 px-3 pt-1"
            >{{ $title }}</span
            >
            <span
                    class="flex h-min space-x-1 items-center rounded-full text-gray-400 bg-gray-800 py-1 px-2 text-xs font-medium"
            >
              <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-blue-300"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
              >
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <p class="text-blue-300 font-semibold text-xs">
                {{ $cardType === 'tweet' ? $tweet->created_at->diffForHumans() : $user->created_at->diffForHumans() }}
              </p>
            </span>
        </div>
        @if($cardType === 'tweet')
            <div class="py-2 px-4">
                <h1
                        class="text-xl font-medium leading-6 tracking-wide text-blue-300 hover:text-gray-300"
                >
                    <span>{{ $tweet->body }}</span>
                </h1>
            </div>
        @endif
        <div class="flex flex-row items-end h-full w-full px-4 mt-4">
            <div class="flex border-t border-gray-700 w-full py-4">
                <div
                        class="flex items-center space-x-3 border-r border-gray-700 w-full"
                >
                    <img
                            class="object-cover w-8 h-8 border-2 border-white rounded-full"
                            src="https://storageapi.fleek.co/kamaludin21-team-bucket/portfolio/avatar.jpg"
                            alt="profile users"
                            loading="lazy"
                    />
                    <div class="">
                        <p class="text-sm font-semibold tracking-wide text-gray-200">
                            {{ $user->username }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center flex-shrink-0 px-2">
                    <div class="flex items-center space-x-1 text-gray-400">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                            />
                        </svg>
                        <p class="font-medium">{{ $tweet->likeCount() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>