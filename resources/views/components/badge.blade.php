<div class="w-full sm:w-1/2 md:w-1/3 px-2">
    <div class="rounded overflow-hidden shadow-lg bg-white mt-3 p-4">
        <h2 class="text-gray-700 subpixel-antialiased" style="font-size: 13px; font-weight: 500">{{$badge["title"]}}</h2>
        <div>
            {{ Illuminate\Mail\Markdown::parse($badge["markdown"]) }}
        </div>
        <div class="pt-3">
            <div tabindex="-1" onclick="window.getSelection().selectAllChildren(this)"
                class="bg-gray-300 text-gray-700 block border-0 p-4 rounded">{{$badge["markdown"]}}</div>
        </div>
    </div>
</div>
