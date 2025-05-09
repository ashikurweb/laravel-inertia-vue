

<template>
  <Head>
    <title>My App</title>
  </Head>
  <header class="bg-white shadow-sm">
    <div class="container mx-auto max-w-7xl px-6 py-4 flex items-center justify-between">
      <!-- Logo + Brand -->
      <div class="flex items-center space-x-3">
        <Link :href="route('home')" class="flex items-center space-x-2">
          <img src="https://www.logoai.com/oss/icons/2021/10/27/NTs7EMHlHtbJE3B.png" alt="Logo" class="w-10 h-10 rounded-full" />
        </Link>
      </div>

      <!-- Nav Links -->
      <nav class="hidden md:flex items-center space-x-6">
        <Link :href="route('home')" class="text-sm text-gray-600 hover:text-primary transition">Home</Link>
      </nav>
      <div v-if="$page.props.auth.user" class="flex items-center space-x-3">
        <Link :href="route('logout')" method="post" as="button" type="button" class="hidden md:inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 transition">
          <i class="fa-solid fa-right-from-bracket mr-2"></i>
          Logout
        </Link>
      </div>
      <!-- Action Button -->
      <div v-else class="flex items-center space-x-3">
        <Link :href="route('login')" class="hidden md:inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 transition">
          <i class="fa-solid fa-user-tie mr-2"></i>
          My Account
        </Link>
        <!-- Mobile Menu Icon -->
        <button class="md:hidden focus:outline-none">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <main class="container mx-auto max-w-7xl px-6 py-4">
    <slot />
  </main>
</template>
