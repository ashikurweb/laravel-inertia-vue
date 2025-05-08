<script setup lang="ts">

</script>

<template>
  <section class="bg-white shadow-sm">
  <div class="container mx-auto max-w-7xl px-6 py-5 flex flex-col md:flex-row justify-between items-center">
    <div class="flex items-center space-x-4">
      <Link :href="route('home')" class="flex items-center space-x-2">
        <img src="https://www.logoai.com/oss/icons/2021/10/27/NTs7EMHlHtbJE3B.png" class="w-10 h-10" alt="Logo">
      </Link>
      <nav class="hidden md:flex space-x-6 ml-6 border-l border-gray-200 pl-6">
        <a :href="route('home')" class="text-gray-600 hover:text-gray-900">Home</a>
      </nav>
    </div>
    <div class="flex items-center space-x-4 mt-4 md:mt-0">
      <Link  class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-500 transition">
        <i class="fa-solid fa-user-tie mr-2"></i>
        My Account
      </Link>
    </div>
  </div>
</section>
</template>