<script setup>
import { toDisplayString } from 'vue'

const props = defineProps({
  modelValue: {
    type: [String, Number],
    default: '',
  },
  label: {
    type: String,
    required: true,
  },
  id: {
    type: String,
    default: '',
  },
  type: {
    type: String,
    default: 'text',
  },
  placeholder: {
    type: String,
    default: '',
  },
  error: {
    type: [String, Array],
    default: null,
  },
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
    <div class="mb-4">
      <label :for="id" class="block text-base font-semibold mb-2 text-gray-600">
        {{ label }}
      </label>
      <input
        :id="id"
        :type="type"
        :value="modelValue"
        @input="e => emit('update:modelValue', e.target.value)"
        :placeholder="placeholder"
        :class="[
          'w-full px-4 py-2 border rounded-md focus:ring-2 focus:outline-none transition-all duration-300',
          error ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500'
        ]"
      />
      <small v-if="error" class="text-red-500 mt-1">
        {{ Array.isArray(error) ? error.join(', ') : error }}
      </small>
    </div>
  </template>