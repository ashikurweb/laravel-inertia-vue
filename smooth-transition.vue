<transition
    appear
    mode="out-in"
    enter-active-class="transition-all ease-in-out duration-500"
    enter-from-class="opacity-0 -translate-y-6"
    enter-to-class="opacity-100 translate-y-0"
    leave-active-class="transition-all ease-in-out duration-400"
    leave-from-class="opacity-100 translate-y-0"
    leave-to-class="opacity-0 -translate-y-6"
    @enter="lockScroll"
    @after-enter="unlockScroll"
    @leave="lockScroll"
    @after-leave="unlockScroll"
  >
    <!-- key on url forces re-mount each visit -->
    <main :key="page.url" class="container mx-auto max-w-7xl px-4 sm:px-6 py-4">
      <slot />
    </main>
  </transition>

<script setup>
import { usePage } from '@inertiajs/vue3'
import { ref, onMounted, onBeforeUnmount } from 'vue'

const isMobileMenuOpen = ref(false)
const isMobileDropdownOpen = ref(false)

const mobileMenuRef = ref(null)
const mobileDropdownRef = ref(null)

const page = usePage()
function lockScroll() {
  document.body.style.overflow = 'hidden'
}
function unlockScroll() {
  document.body.style.overflow = ''
}

function toggleMobileMenu() {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
  if (!isMobileMenuOpen.value) {
    isMobileDropdownOpen.value = false
  }
}

function toggleMobileDropdown() {
  isMobileDropdownOpen.value = !isMobileDropdownOpen.value
}

// Close menus when clicking outside
function onClickOutside(e) {
  // close mobile menu
  if (
    isMobileMenuOpen.value &&
    mobileMenuRef.value &&
    !mobileMenuRef.value.contains(e.target)
  ) {
    isMobileMenuOpen.value = false
    isMobileDropdownOpen.value = false
  }
  // close dropdown if open
  if (
    isMobileDropdownOpen.value &&
    mobileDropdownRef.value &&
    !mobileDropdownRef.value.contains(e.target)
  ) {
    isMobileDropdownOpen.value = false
  }
}

onMounted(() => {
  document.addEventListener('click', onClickOutside)
})

onBeforeUnmount(() => {
  document.removeEventListener('click', onClickOutside)
})
</script>


<style>
/* smooth native scrolling for jump links, etc. */
html {
  scroll-behavior: smooth;
}

/* optional: style WebKit scrollbars so they’re less jarring */
::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-track {
  background: transparent;
}
::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.2);
  border-radius: 3px;
}
::-webkit-scrollbar-thumb:hover {
  background-color: rgba(0, 0, 0, 0.3);
}
</style>

