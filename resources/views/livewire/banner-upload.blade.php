<div>
    <label for="banner" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        Banner
    </label>

    <div class="banner">
        @if ($banner)
            <label for="banner">
                <img class="border border-blue-400 w-full mb-2" style="height: 200px;" src="{{ $banner->temporaryUrl() }}" alt="Your banner">
            </label>
        @else
            <label for="banner">
                <img class="border border-blue-400 w-full mb-2" style="height: 200px;" src="{{ $user->banner }}" alt="Your banner">
            </label>
        @endif

        <input
                type="file"
                class="border border-blue-400 p-2 w-full"
                id="banner"
                name="banner"
                style="display: none;"
                wire:model="banner"
        >

    </div>
</div>
