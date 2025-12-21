# Color Picker

A color selection component for Laravel applications. Choose colors from a palette or enter hex values. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/color-picker
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-color-picker wire:model="color" />
```

### With Preset Colors

```blade
<livewire:sb-color-picker
    wire:model="color"
    :colors="['#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#FF00FF', '#00FFFF']"
/>
```

### With Custom Input

```blade
<livewire:sb-color-picker
    wire:model="color"
    :show-input="true"
    placeholder="Enter hex color"
/>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wire:model` | string | - | Selected color (hex) |
| `colors` | array | defaults | Preset color options |
| `show-input` | boolean | `true` | Show hex input field |
| `placeholder` | string | `'#000000'` | Input placeholder |

## Vue 3 Usage

### Setup

```javascript
import { SbColorPicker } from './vendor/sb-color-picker';
app.component('SbColorPicker', SbColorPicker);
```

### Basic Usage

```vue
<template>
  <SbColorPicker v-model="selectedColor" />
  <p>Selected: {{ selectedColor }}</p>
</template>

<script setup>
import { ref } from 'vue';
const selectedColor = ref('#3B82F6');
</script>
```

### Custom Palette

```vue
<template>
  <SbColorPicker
    v-model="color"
    :colors="brandColors"
  />
</template>

<script setup>
import { ref } from 'vue';

const color = ref('#1E40AF');
const brandColors = [
  '#1E40AF', // Primary
  '#1E3A8A', // Primary Dark
  '#60A5FA', // Primary Light
  '#10B981', // Success
  '#F59E0B', // Warning
  '#EF4444', // Danger
];
</script>
```

### Form Integration

```vue
<template>
  <form @submit.prevent="save">
    <div>
      <label class="block text-sm font-medium mb-1">Theme Color</label>
      <SbColorPicker v-model="settings.themeColor" />
    </div>

    <div class="mt-4">
      <label class="block text-sm font-medium mb-1">Background</label>
      <SbColorPicker v-model="settings.backgroundColor" />
    </div>

    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
      Save Settings
    </button>
  </form>
</template>
```

### With Preview

```vue
<template>
  <div class="flex items-center gap-4">
    <SbColorPicker v-model="color" />
    <div
      class="w-16 h-16 rounded border"
      :style="{ backgroundColor: color }"
    ></div>
  </div>
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `modelValue` | String | `'#000000'` | Selected hex color |
| `colors` | Array | Default palette | Available colors |
| `showInput` | Boolean | `true` | Show manual input |
| `placeholder` | String | `'#000000'` | Input placeholder |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `update:modelValue` | `string` | Color changed |

## Default Palette

```javascript
[
  '#000000', '#FFFFFF', '#F3F4F6', '#6B7280',
  '#EF4444', '#F97316', '#F59E0B', '#EAB308',
  '#84CC16', '#22C55E', '#10B981', '#14B8A6',
  '#06B6D4', '#0EA5E9', '#3B82F6', '#6366F1',
  '#8B5CF6', '#A855F7', '#D946EF', '#EC4899'
]
```

## Features

- **Color Palette**: Click to select
- **Hex Input**: Enter custom values
- **Preview**: Shows selected color
- **Validation**: Validates hex format
- **Customizable**: Use your own palette

## Styling

Uses Tailwind CSS:
- Grid layout for swatches
- Ring highlight on selected
- Input with validation
- Rounded color swatches

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
