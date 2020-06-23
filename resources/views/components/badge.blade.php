<div class="rounded overflow-hidden shadow-lg mt-3 w-100 p-4">
    <h2 class="antialiased font-extrabold" style="font-size: 15px">{{$badge["title"]}}
        <div class="float-right">
            {{ Illuminate\Mail\Markdown::parse($badge["markdown"]) }}
        </div>
    </h2>
    <div class="pt-3">
        <div tabindex="-1" onclick="window.getSelection().selectAllChildren(this)"
            class="w-full bg-gray-300 text-gray-700 block border-0 p-4 rounded">{{$badge["markdown"]}}</div>
    </div>
</div>
