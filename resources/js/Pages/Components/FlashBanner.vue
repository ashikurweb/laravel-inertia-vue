<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue'
import { usePage } from '@inertiajs/vue3'

// Grab flash props
const { flash } = usePage().props
const message = flash.success || flash.error || ''
const type = flash.success ? 'success' : flash.error ? 'error' : ''

// Visibility and spinner state
const show = ref(false)
const iconSpinning = ref(true)
let timerId = null

// Computed classes
const bannerClasses = computed(() => ({
  'relative flex items-start gap-3 p-5 rounded-2xl shadow-md border backdrop-blur-lg bg-white/75 transition-opacity transition-transform': true,
  'border-green-200': type === 'success',
  'border-red-200': type === 'error'
}))
const textClasses = computed(() => ({
  'text-base leading-snug font-medium': true,
  'text-green-600': type === 'success',
  'text-red-600': type === 'error'
}))
const iconColorClass = computed(() => type === 'success' ? 'text-green-500' : 'text-red-500')

// Lifecycle: show, spin, auto-dismiss
onMounted(() => {
  if (message) {
    setTimeout(() => (show.value = true), 50)
    setTimeout(() => (iconSpinning.value = false), 800)
    timerId = setTimeout(() => (show.value = false), 5050)
  }
})
onBeforeUnmount(() => clearTimeout(timerId))

function closeBanner() {
  clearTimeout(timerId)
  show.value = false
}
</script>

<template>
  <transition
    enter-active-class="duration-300 ease-out"
    enter-from-class="opacity-0 translate-y-4"
    enter-to-class="opacity-100 translate-y-0"
    leave-active-class="duration-200 ease-in"
    leave-from-class="opacity-100 translate-y-0"
    leave-to-class="opacity-0 translate-y-4"
  >
    <div v-if="show" class="fixed top-3 right-5 z-50 w-full max-w-sm pointer-events-auto">
      <div :class="bannerClasses">
        <!-- Spinner / Icon -->
        <div class="flex-shrink-0 relative h-6 w-6">
          <svg
            v-if="iconSpinning"
            class="h-6 w-6"
            :class="iconColorClass"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            style="animation: spin-slow 1.2s linear infinite;"
          >
            <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="3" class="opacity-25"/>
            <path fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z" class="opacity-75"/>
          </svg>
          <svg
            v-else
            class="h-6 w-6"
            :class="type==='success'
              ? 'text-green-600'
              : 'text-red-600'"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  :d="type==='success'
                    ? 'M9 12l2 2 4-4'
                    : 'M12 8v4m0 4h.01'" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  :d="type==='success'
                    ? 'M12 21a9 9 0 100-18 9 9 0 000 18z'
                    : 'M12 2a10 10 0 100 20 10 10 0 000-20z'" />
          </svg>
        </div>

        <!-- Message -->
        <div class="flex-1">
          <p :class="textClasses">{{ message }}</p>
        </div>

        <!-- Close button -->
        <button
          @click="closeBanner"
          class="ml-3 -mt-1 -mr-1 p-1 rounded-full focus:outline-none transition-opacity duration-200 hover:opacity-70"
          :class="type==='success'
            ? 'text-green-500 hover:bg-green-100 dark:text-green-600'
            : 'text-red-500 hover:bg-red-100  dark:text-red-600'"
          aria-label="Close notification"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1
                     1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0
                     01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0
                     01-1.414-1.414L8.586 10 4.293 5.707a1 1 0
                     010-1.414z"/>
          </svg>
        </button>
      </div>
    </div>
  </transition>
</template>

<style>
@keyframes spin-slow {
  to { transform: rotate(360deg); }
}
</style>