<script setup>

const props = defineProps({
    modelValue: {
        type: Boolean,
        default: false,
    },

    label: {
        type: String,
        reqired: true,
    },
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div class="flex items-center">
      <input
        type="checkbox"
        :checked="modelValue"
        @change="e => emit('update:modelValue', e.target.checked)"
        class="form-checkbox"
      />
      <span class="ml-2 text-sm text-gray-600">{{ label }}</span>
    </div>
  </template>