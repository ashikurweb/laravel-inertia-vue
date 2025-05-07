<script setup>
import { Link, Head } from '@inertiajs/vue3';
</script>

<template>

  <Head>
    <title>Welcome to Inertia App with Tailwind CSS and Laravel</title>
    <meta head-key="description" name="description" content="This is a default description" />
  </Head>
  <div class="min-h-screen flex flex-col">
    <!-- Header / Navbar -->
    <header class="bg-white shadow-md">
      <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-2xl font-bold text-gray-800">YourLogo</div>
        <!-- Navigation Links -->
        <ul class="hidden md:flex space-x-8">
          <li>
            <Link :href="route('home')" class="text-gray-600 hover:text-gray-900 transition">Home</Link>
          </li>
          <li>
            <Link :href="route('about')" class="text-gray-600 hover:text-gray-900 transition">About</Link>
          </li>
        </ul>
        <!-- Mobile Menu Button -->
        <button class="md:hidden focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </nav>
    </header>

    <!-- Main Content Slot -->
    <main class="flex-1 container mx-auto px-6 py-10">
      <slot />
    </main>
  </div>
</template>