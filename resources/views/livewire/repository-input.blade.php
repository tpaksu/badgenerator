<div>
    <form class="w-full mx-auto">
        <div class="flex items-center border-b border-b-2 @if($valid) border-green-400 @else border-red-400 @endif  py-2">
            <input
                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none text-center"
                type="text"
                placeholder="Enter Repository URL"
                aria-label="Repository Path"
                wire:model.debounce.500ms="query"
            >
            <div class="bg-blue-light shadow-border p-3">
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
            </div>
        </div>
    </form>
    <div>
        @if($valid)
            @foreach($badges as $badge)
                <x-badge :badge="$badge"></x-badge>
            @endforeach
        @endif
    </div>
</div>
