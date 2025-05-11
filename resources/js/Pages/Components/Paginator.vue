<script setup>
defineProps({
  paginationData: Object, 
});
</script>

<template>
  <div class="flex items-center justify-between mt-4 px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          <span class="font-medium">{{ paginationData.from }}</span>
          to
          <span class="font-medium">{{ paginationData.to }}</span>
          of
          <span class="font-medium">{{ paginationData.total }}</span>
          results
        </p>
      </div>
      <div>
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
          <!-- Pagination Links -->
          <a 
            v-for="(link, index) in paginationData.links" 
            :key="index" 
            :href="link.url"
            @click.prevent="$inertia.visit(link.url)"
            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
            :class="{
              'bg-violet-500 text-white': link.active,  // Active page styling
              'bg-indigo-50 border-indigo-500 text-indigo-600': link.active, // Optional active state
              'pointer-events-none bg-gray-300': !link.url  // Disabled links
            }"
            v-html="link.label">
          </a>
        </nav>
      </div>
    </div>
  </div>
</template>

