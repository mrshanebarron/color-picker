<template>
  <div class="space-y-3">
    <label v-if="label" class="block text-sm font-medium text-gray-700">{{ label }}</label>

    <div class="flex items-center gap-3">
      <div class="relative">
        <input
          type="color"
          :value="modelValue"
          @input="updateColor($event.target.value)"
          class="w-12 h-12 rounded-lg border border-gray-300 cursor-pointer p-1"
        >
      </div>

      <input
        v-if="showInput"
        type="text"
        :value="modelValue"
        @input="updateColor($event.target.value)"
        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm font-mono uppercase focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        maxlength="7"
        placeholder="#000000"
      >
    </div>

    <div v-if="presetColors.length" class="flex flex-wrap gap-2">
      <button
        v-for="color in presetColors"
        :key="color"
        @click="updateColor(color)"
        :class="['w-8 h-8 rounded-lg border-2 transition-all', modelValue === color ? 'border-gray-900 scale-110' : 'border-gray-200 hover:border-gray-400']"
        :style="{ backgroundColor: color }"
        :title="color"
      ></button>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';

export default {
  name: 'LdColorPicker',
  props: {
    modelValue: { type: String, default: '#000000' },
    presets: { type: Array, default: () => [] },
    showInput: { type: Boolean, default: true },
    label: { type: String, default: '' }
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const presetColors = computed(() =>
      props.presets.length ? props.presets : [
        '#ef4444', '#f97316', '#eab308', '#22c55e', '#14b8a6',
        '#3b82f6', '#8b5cf6', '#ec4899', '#000000', '#6b7280'
      ]
    );

    const updateColor = (color) => {
      if (/^#[0-9A-Fa-f]{6}$/.test(color) || /^#[0-9A-Fa-f]{3}$/.test(color)) {
        emit('update:modelValue', color.toUpperCase());
      } else if (color.length <= 7) {
        emit('update:modelValue', color);
      }
    };

    return { presetColors, updateColor };
  }
};
</script>
