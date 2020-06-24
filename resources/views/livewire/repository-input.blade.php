<div>
    <form class="w-full mx-auto max-w-screen-sm">
        <div class="flex items-center border-b-2 @if(empty($query)) border-gray-400 @else @if($valid) border-green-400 @else border-red-400 @endif @endif  py-2">
            <input
                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none text-center"
                type="text"
                placeholder="Enter repository full URL"
                aria-label="Repository Path"
                wire:model.debounce.500ms="query"
            >
            <div class="bg-blue-light shadow-border p-3">
                @if(empty($query))
                <div class="w-5 h-5">
                    <x-icon path="/assets/zondicons/search.svg" class="fill-current text-gray-300"></x-icon>
                </div>
                @else
                <div class="w-5 h-5 hidden" wire:loading.class.remove="hidden">
                    <x-icon path="/assets/zondicons/hour-glass.svg" class="fill-current text-gray-300"></x-icon>
                </div>
				<div class="w-5 h-5" wire:loading.class="hidden">
                    @if($valid)
                    <x-icon path="/assets/zondicons/checkmark.svg" class="fill-current text-green-400"></x-icon>
                    @else
                    <x-icon path="/assets/zondicons/close.svg" class="fill-current text-red-400"></x-icon>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </form>
    @if($valid)
    <div class="flex flex-wrap mb-4 max-w-screen-lg -mx-2 py-16">
        @foreach($badges as $badge)
            <x-badge :badge="$badge"></x-badge>
        @endforeach
    </div>
    @endif
</div>
