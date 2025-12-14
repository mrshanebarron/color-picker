<div x-data="{ showPicker: false }" class="relative">
    <button
        type="button"
        @click="showPicker = !showPicker"
        class="flex items-center gap-2 px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50"
    >
        <span class="w-6 h-6 rounded border" style="background-color: {{ $value }}"></span>
        @if($showInput)
            <span class="text-sm text-gray-700">{{ $value }}</span>
        @endif
    </button>

    <div
        x-show="showPicker"
        @click.outside="showPicker = false"
        x-transition
        class="absolute z-10 mt-2 p-3 bg-white rounded-lg shadow-lg border"
    >
        <div class="mb-3">
            <input
                type="color"
                wire:model.live="value"
                class="w-full h-10 cursor-pointer rounded"
            >
        </div>

        <div class="grid grid-cols-5 gap-2">
            @foreach($swatches as $swatch)
                <button
                    type="button"
                    wire:click="selectColor('{{ $swatch }}')"
                    class="w-8 h-8 rounded-lg border-2 transition-transform hover:scale-110 {{ $value === $swatch ? 'border-gray-900 ring-2 ring-offset-2 ring-gray-400' : 'border-transparent' }}"
                    style="background-color: {{ $swatch }}"
                ></button>
            @endforeach
        </div>

        @if($showInput)
            <div class="mt-3">
                <input
                    type="text"
                    wire:model.live="value"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    placeholder="#000000"
                >
            </div>
        @endif
    </div>
</div>
