<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf


        <textarea
                name="body"
                class="w-full"
                placeholder="Whats up doc?"
                style="border:none; outline:none; resize: none; overflow: hidden;"
                onkeyup="textCounter(this,'counter',191);"
                required
        ></textarea>
        <div class="flex justify-between">
            <div></div>
            <input class="font-bold text-sm text-blue-400" disabled maxlength="191" size="3" value="0/191" id="counter">
        </div>

        <script>
            function textCounter(field,field2,maxlimit)
            {
                var countfield = document.getElementById(field2);
                if ( field.value.length > maxlimit ) {
                    field.value = field.value.substring( 0, maxlimit );
                    return false;
                } else {
                    countfield.value = 0 + field.value.length + "/" + maxlimit;
                }
            }
        </script>

        <hr class="my-4 border-b border-blue-100">

        <footer class="flex justify-between items-center">
            <img
                    src="{{auth()->user()->avatar}}"
                    alt=""
                    class="rounded-full mr-2"
                    width="50px"
                    height="50px"
            >
            <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 rounded-lg shadow py-2 px-2 text-white"
            >

                Tweetay

            </button>
        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>