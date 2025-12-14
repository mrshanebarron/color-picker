# Laravel Design Color Picker

Color picker with swatches and hex input for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/color-picker
```


## Usage

### Livewire Component

```blade
<livewire:ld-color-picker />
```

### Blade Component

```blade
<x-ld-color-picker />
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-color-picker-config
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-color-picker-views
```

## License

MIT
