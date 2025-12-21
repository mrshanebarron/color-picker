<div x-data="{ showPicker: false }" style="position: relative; display: inline-block;">
    <button
        type="button"
        x-on:click="showPicker = !showPicker"
        style="display: flex; align-items: center; gap: 8px; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: white; cursor: pointer;"
    >
        <span style="width: 24px; height: 24px; border-radius: 4px; border: 1px solid #e5e7eb; background-color: {{ $value }};"></span>
        @if($showInput)
            <span style="font-size: 14px; color: #374151;">{{ $value }}</span>
        @endif
    </button>

    <div
        x-show="showPicker"
        x-on:click.outside="showPicker = false"
        :class="showPicker ? 'sb-picker-visible' : 'sb-picker-hidden'"
        style="position: absolute; z-index: 50; margin-top: 8px; padding: 12px; background: white; border-radius: 8px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;"
    >
        <div style="margin-bottom: 12px;">
            <input
                type="color"
                wire:model.live="value"
                style="width: 100%; height: 40px; cursor: pointer; border-radius: 4px; border: none;"
            >
        </div>

        <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 8px;">
            @foreach($swatches as $swatch)
                <button
                    type="button"
                    wire:click="selectColor('{{ $swatch }}')"
                    style="width: 32px; height: 32px; border-radius: 8px; cursor: pointer; transition: transform 0.15s; border: 2px solid {{ $value === $swatch ? '#111827' : 'transparent' }}; background-color: {{ $swatch }};"
                    onmouseover="this.style.transform='scale(1.1)'"
                    onmouseout="this.style.transform='scale(1)'"
                ></button>
            @endforeach
        </div>

        @if($showInput)
            <div style="margin-top: 12px;">
                <input
                    type="text"
                    wire:model.live="value"
                    style="width: 100%; padding: 8px 12px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 8px; outline: none;"
                    placeholder="#000000"
                >
            </div>
        @endif
    </div>
    <style>
        .sb-picker-hidden { visibility: hidden; opacity: 0; transition: opacity 150ms ease, visibility 150ms ease; }
        .sb-picker-visible { visibility: visible; opacity: 1; transition: opacity 150ms ease, visibility 150ms ease; }
    </style>
</div>
