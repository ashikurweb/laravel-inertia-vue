<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue'
import { usePage } from '@inertiajs/vue3'

// Grab both possible flash messages
const { flash } = usePage().props
const message = flash.success || flash.error || ''
const type = flash.success ? 'success' : flash.error ? 'error' : ''

// Reactive visibility
const show = ref(!!message)
let timerId = null

// Computed classes based on type
const bannerClasses = computed(() =>
  type === 'success'
    ? 'bg-white border border-green-100 text-green-700'
    : 'bg-white border border-red-100 text-red-700'
)
const iconColor = computed(() =>
  type === 'success' ? 'text-green-500' : 'text-red-500'
)
const closeButtonColor = computed(() =>
  type === 'success'
    ? 'text-green-400 hover:text-green-600'
    : 'text-red-400 hover:text-red-600'
)

// Auto-dismiss after 3 seconds
onMounted(() => {
  if (show.value) {
    timerId = setTimeout(() => {
      show.value = false
    }, 3000)
  }
})
onBeforeUnmount(() => {
  clearTimeout(timerId)
})

// Manual close handler
function closeBanner() {
  clearTimeout(timerId)
  show.value = false
}
</script>


<template>
  <transition
    appear
    enter-active-class="transition ease-out duration-300"
    enter-from-class="opacity-0 transform translate-x-2"
    enter-to-class="opacity-100 transform translate-x-0"
    leave-active-class="transition ease-in duration-200"
    leave-from-class="opacity-100 transform translate-x-0"
    leave-to-class="opacity-0 transform translate-x-2"
  >
    <div v-if="show" class="fixed top-4 right-4 z-50 max-w-sm w-full">
      <div :class="['flex items-center p-4 rounded-lg shadow-md', bannerClasses]">
        <!-- Icon -->
        <div class="flex-shrink-0">
          <svg
            v-if="type === 'success'"
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            :class="iconColor"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
          <svg
            v-else
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            :class="iconColor"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 8v4m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"
            />
          </svg>
        </div>

        <!-- Message -->
        <div class="ml-3 flex-1">
          <p class="text-sm font-medium">{{ message }}</p>
        </div>

        <!-- Close button -->
        <button
          type="button"
          @click="closeBanner"
          :class="['ml-4 flex-shrink-0 focus:outline-none', closeButtonColor]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            :class="iconColor"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 
                 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 
                 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 
                 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 
                 010-1.414z"
            />
          </svg>
        </button>
      </div>
    </div>
  </transition>
</template>


