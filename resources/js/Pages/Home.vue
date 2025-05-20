<script setup>
import FlashBanner from './Components/FlashBanner.vue';
import AllUsers from './Components/AllUsers.vue'; 

const props = defineProps({
  users: Object,
  can: Object,
});
</script>

<template>
  <FlashBanner />
  <h1 class="text-5xl font-bold text-gray-600 mb-8">Home Page</h1>

  <AllUsers :users="users" :can="can" />
</template>
