<template>
  <Head>
    <title>My App</title>
  </Head>

  <header ref="headerRef" class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 py-4 flex items-center justify-between">
      <!-- Logo + Brand -->
      <div class="flex items-center space-x-3">
        <Link :href="route('home')" class="flex items-center space-x-2">
          <img
            src="https://www.logoai.com/oss/icons/2021/10/27/NTs7EMHlHtbJE3B.png"
            alt="Logo"
            class="w-10 h-10 rounded-full"
          />
        </Link>
      </div>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center space-x-6">
        <Link
          :href="route('home')"
          class="text-sm text-gray-600 hover:text-primary transition"
          :class="{
            'bg-slate-100 px-3 py-2 rounded-md text-primary font-medium':
              $page.component === 'Home'
          }"
        >
          Home
        </Link>
      </nav>

      <!-- Desktop Auth -->
      <div v-if="$page.props.auth.user" class="hidden md:flex items-center space-x-3">
        <!-- ...existing desktop dropdown... -->
      </div>
      <div v-else class="hidden md:flex items-center space-x-3">
        <Link
          :href="route('login')"
          class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 transition"
        >
          <i class="fa-solid fa-user-tie mr-2" /> My Account
        </Link>
      </div>

      <!-- Mobile Toggle -->
      <div class="md:hidden flex items-center">
        <button
          @click.stop="toggleMobileMenu"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-primary hover:bg-gray-100 focus:outline-none"
        >
          <svg
            class="h-6 w-6"
            :class="{ hidden: isMobileMenuOpen, block: !isMobileMenuOpen }"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg
            class="h-6 w-6"
            :class="{ hidden: !isMobileMenuOpen, block: isMobileMenuOpen }"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Menu -->
  <transition
    appear
    enter-active-class="transition ease-out duration-300"
    enter-from-class="opacity-0 transform -translate-y-2"
    enter-to-class="opacity-100 transform translate-y-0"
    leave-active-class="transition ease-in duration-200"
    leave-from-class="opacity-100 transform translate-y-0"
    leave-to-class="opacity-0 transform -translate-y-2"
  >
    <div
      v-if="isMobileMenuOpen"
      ref="mobileMenuRef"
      @click.stop
      class="md:hidden bg-white overflow-hidden"
    >
      <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
        <Link
          :href="route('home')"
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
          :class="{ 'bg-gray-100 text-primary': $page.component === 'Home' }"
        >
          Home
        </Link>

        <template v-if="$page.props.auth.user">
          <!-- Mobile Dropdown -->
          <div ref="mobileDropdownRef" class="relative">
            <button
              @click.stop="toggleMobileDropdown"
              class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 focus:outline-none"
            >
              <span>My Account</span>
              <svg
                class="w-4 h-4 transition-transform"
                :class="{ 'rotate-180': isMobileDropdownOpen }"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Dropdown Panel -->
            <transition
              appear
              enter-active-class="transition ease-out duration-300"
              enter-from-class="opacity-0 transform -translate-y-2"
              enter-to-class="opacity-100 transform translate-y-0"
              leave-active-class="transition ease-in duration-200"
              leave-from-class="opacity-100 transform translate-y-0"
              leave-to-class="opacity-0 transform -translate-y-2"
            >
              <div
                v-if="isMobileDropdownOpen"
                class="pl-4 divide-y divide-gray-100"
              >
                <Link
                  :href="route('dashboard')"
                  class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
                >
                  <i class="fa-solid fa-gauge mr-2" /> Dashboard
                </Link>
                <!-- ...other links... -->
                <Link
                  :href="route('logout')"
                  method="post"
                  as="button"
                  class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
                >
                  <i class="fa-solid fa-right-from-bracket mr-2" /> Logout
                </Link>
              </div>
            </transition>
          </div>
        </template>

        <template v-else>
          <Link
            :href="route('login')"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
          >
            <i class="fa-solid fa-user-tie mr-2" /> My Account
          </Link>
        </template>
      </div>
    </div>
  </transition>

  <main class="container mx-auto max-w-7xl px-4 sm:px-6 py-4">
    <slot />
  </main>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

const isMobileMenuOpen = ref(false)
const isMobileDropdownOpen = ref(false)

const mobileMenuRef = ref(null)
const mobileDropdownRef = ref(null)

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
