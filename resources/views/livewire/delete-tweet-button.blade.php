<div>
    <script>
        $(".specialButton").click(function(){
            return confirm("Do you want to delete this tweet?");
        });
    </script>

    <form wire:submit.prevent="destroy" onsubmit= "return confirm('Are you sure you want to delete tweet?')">
        <button type="submit" class="text-xl text-gray-700">
            <svg viewBox="0 0 20 20" class="mr-1 w-4">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g class="fill-current">
                        <polygon id="Combined-Shape" points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644"></polygon>
                    </g>
                </g>
            </svg>
        </button>
    </form>
</div>