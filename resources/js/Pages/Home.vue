<script setup>
import Paginator from './Components/Paginator.vue';
import FlashBanner from './Components/FlashBanner.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash';

const props = defineProps({
  users: Object,
  can  : Object, 
});

const search = ref('');

watch(
  search,
  debounce((s) =>
    router.get('/', { search: s }, { preserveState: true, replace: true }),
  500),
);

const getUserImage = (image) =>
  image ? '/images/users/' + image : '/assets/image/default.png';

const getDate = (date) =>
  new Date(date).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  });
</script>

<template>
  <FlashBanner />

  <h1 class="text-5xl font-bold text-gray-600 mb-8">Home Page</h1>

  <div class="overflow-x-auto shadow-[0_3px_5px_rgb(0,0,0,0.1)] rounded-lg border border-slate-200">
    <!-- Search -->
    <div class="flex justify-end mr-2 mb-6">
      <div class="relative w-1/3 md:w-1/4">
        <input
          type="search"
          placeholder="Search..."
          v-model="search"
          class="w-full mt-2 pl-8 pr-4 py-3 border border-gray-300 rounded-md
                 text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500
                 focus:border-transparent shadow-sm transition-all duration-200
                 hover:shadow-sm"
        />
        <i class="fa-solid fa-magnifying-glass absolute bottom-4 left-3 text-gray-400"></i>
      </div>
    </div>

    <!-- Results -->
    <div v-if="users.data.length">
      <!-- Responsive Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-100/70 rounded-lg overflow-hidden">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Image</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
              <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Registration Date</th>
              <th v-if="can.deleteUser" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr
              v-for="(user, index) in users.data"
              :key="user.id"
              class="hover:bg-gray-50"
            >
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                {{ (users.current_page - 1) * users.per_page + index + 1 }}
              </td>
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                <img
                  class="w-10 h-10 rounded-full object-cover hover:ring hover:ring-slate-200 transition duration-300 ease-in-out"
                  :src="getUserImage(user.image)"
                  alt="user avatar"
                />
              </td>
              <td class="px-4 py-3 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
              </td>
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ user.email }}</td>
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ getDate(user.created_at) }}</td>
              <td v-if="can.deleteUser" class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">
                  <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <button type="button" class="text-red-600 hover:text-red-900">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Paginator -->
      <Paginator :paginationData="users" />
    </div>

    <!-- No Data Found UI -->
    <div v-else class="flex flex-col items-center justify-center py-16 text-gray-500">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="w-16 h-16 mb-4 text-gray-300"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="1.5"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 16.65zM9 9l6 6"
        />
      </svg>
      <h3 class="text-xl font-semibold">No users found</h3>
      <p class="mt-2 text-sm">Try adjusting your search term.</p>
    </div>
  </div>
</template>
