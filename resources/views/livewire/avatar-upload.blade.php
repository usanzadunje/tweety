<div>
    <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        Avatar
    </label>

    <div class="avatar flex">
        <input
                type="file"
                class="border border-blue-400 p-2 w-full"
                id="avatar"
                name="avatar"
                wire:model="avatar"
        >

        @if ($avatar)
            <label for="avatar">
                <img class="rounded-full border border-blue-400" src="{{ $avatar->temporaryUrl() }}" alt="Your avatar" width="50">
            </label>
        @endif
    </div>
</div>