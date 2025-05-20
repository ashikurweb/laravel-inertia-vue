<script setup>
import { ref } from 'vue';

const isMobileMenuOpen = ref(false);
const isMobileDropdownOpen = ref(false);

</script>

<template>
  <Head>
    <title>My App</title>
  </Head>
  <header class=" shadow-sm sticky top-0 z-50">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 py-4 flex items-center justify-between">
      <!-- Logo + Brand -->
      <div class="flex items-center space-x-3">
        <Link :href="route('home')" class="flex items-center space-x-2">
          <img src="https://www.logoai.com/oss/icons/2021/10/27/NTs7EMHlHtbJE3B.png" alt="Logo" class="w-10 h-10 rounded-full" />
        </Link>
      </div>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center space-x-6">
        <Link 
          :href="route('home')" 
          class="text-sm text-default-100 hover:text-primary transition" 
          :class="{'bg-slate-100 px-3 py-2 rounded-md text-primary font-medium': $page.component === 'Home'}"
        >
          Home
        </Link>
      </nav>

      <!-- Desktop Auth Buttons with Dropdown -->
      <div v-if="$page.props.auth.user" class="hidden md:flex items-center space-x-3">
        <!-- User Dropdown Menu -->
        <div class="relative group">
          <button class="flex items-center space-x-1 px-4 py-2 bg-lime-100/90 text-lime-500 text-sm font-medium rounded-md focus:outline-none">
            <img :src="$page.props.auth.user.image ? ('images/users/' + $page.props.auth.user.image): 'assets/image/default.png'" alt="" class="w-8 h-8 rounded-full object-cover mr-2">
            <span>{{ $page.props.auth.user.name }}</span>
            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          
          <div class="absolute right-0 mt-2 w-56 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-slate-200 ring-opacity-5 divide-y divide-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 -translate-y-2">
            <div class="py-1">
              <Link 
                :href="route('dashboard')" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
              >
                <i class="fa-solid fa-gauge mr-2"></i> Dashboard
              </Link>
              <Link 
                href="#" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
              >
                <i class="fa-solid fa-user mr-2"></i> Profile
              </Link>
              <Link 
                href="#" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
              >
                <i class="fa-solid fa-cog mr-2"></i> Settings
              </Link>
            </div>
            <div class="py-1">
              <Link 
                :href="route('logout')" 
                method="post" 
                as="button" 
                class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
              >
                <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
              </Link>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="hidden md:flex items-center space-x-3">
        <Link 
          :href="route('login')" 
          class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 transition"
        >
          <i class="fa-solid fa-user-tie mr-2"></i>
          My Account
        </Link>
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden flex items-center">
        <button 
          @click="isMobileMenuOpen = !isMobileMenuOpen" 
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-primary hover:bg-gray-100 focus:outline-none"
        >
          <svg 
            class="h-6 w-6" 
            :class="{'hidden': isMobileMenuOpen, 'block': !isMobileMenuOpen}" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <svg 
            class="h-6 w-6" 
            :class="{'hidden': !isMobileMenuOpen, 'block': isMobileMenuOpen}" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div 
      class="md:hidden bg-white overflow-hidden transition-all duration-300 ease-in-out" 
      :class="{'max-h-0': !isMobileMenuOpen, 'max-h-screen': isMobileMenuOpen}"
    >
      <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
        <Link 
          :href="route('home')" 
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
          :class="{'bg-gray-100 text-primary': $page.component === 'Home'}"
        >
          Home
        </Link>

        <template v-if="$page.props.auth.user">
          <!-- Mobile Dropdown -->
          <div class="relative">
            <button 
              @click="isMobileDropdownOpen = !isMobileDropdownOpen" 
              class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 focus:outline-none"
            >
              <span>My Account</span>
              <svg 
                class="w-4 h-4 transition-transform" 
                :class="{'rotate-180': isMobileDropdownOpen}" 
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            
            <div 
              class="pl-4 overflow-hidden transition-all duration-300 ease-in-out" 
              :class="{'max-h-0': !isMobileDropdownOpen, 'max-h-60': isMobileDropdownOpen}"
            >
              <Link 
                :href="route('dashboard')" 
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
              >
                <i class="fa-solid fa-gauge mr-2"></i> Dashboard
              </Link>
              <Link 
                href="#" 
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
              >
                <i class="fa-solid fa-user mr-2"></i> Profile
              </Link>
              <Link 
                href="#" 
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
              >
                <i class="fa-solid fa-cog mr-2"></i> Settings
              </Link>
              <Link 
                :href="route('logout')" 
                method="post" 
                as="button" 
                class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
              >
                <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
              </Link>
            </div>
          </div>
        </template>
        <template v-else>
          <Link 
            :href="route('login')" 
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50"
          >
            <i class="fa-solid fa-user-tie mr-2"></i> My Account
          </Link>
        </template>
      </div>
    </div>
  </header>

  <main class="container mx-auto max-w-7xl px-4 sm:px-6 py-4">
    <slot />
  </main>
</template>

<style scoped>

body {
  background-color: red;
}

.transition-all {
  transition-property: all;
}

.duration-300 {
  transition-duration: 300ms;
}

.ease-in-out {
  transition-timing-function: ease-in-out;
}

/* For dropdown transitions */
.group-hover\:translate-y-0 {
  transform: translateY(0);
}

.-translate-y-2 {
  transform: translateY(-0.5rem);
}
</style>