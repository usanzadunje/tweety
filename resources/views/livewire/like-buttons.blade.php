<div class="flex">

    <div class="flex items-center mr-2 {{ $tweet->isLikedBy(current_user()) ? 'text-blue-700' : 'text-gray-700' }}">
        <button wire:click="like" class="text-xs flex items-center">
            <i class="fas fa-thumbs-up mr-1 mirror text-sm hover:text-blue-700"></i>

            <span class="font-bold text-sm mt-1">{{ $tweet->likeCount() ?? 0}}</span>
        </button>
    </div>


    <div class="flex items-center {{ $tweet->isDislikedBy(current_user()) ? 'text-red-700' : 'text-gray-700' }}">
        <button wire:click="dislike" class="text-xs flex items-center mt-1">
            <i class="fas fa-thumbs-down mr-1 mirror text-sm hover:text-red-700"></i>

            <span class="font-bold text-sm">{{ $tweet->dislikeCount() ?? 0 }}</span>
        </button>

    </div>

</div>