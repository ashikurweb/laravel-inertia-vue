<script setup>
defineProps({
  paginationData: Object,
});
</script>

<template>
  <div class="flex items-center justify-between mt-6 px-4 py-3 bg-white border-t border-gray-200 sm:px-6 rounded-lg shadow-sm">
    <div class="flex-1 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="text-sm text-gray-600">
        Showing
        <span class="font-medium text-gray-800">{{ paginationData.from }}</span>
        to
        <span class="font-medium text-gray-800">{{ paginationData.to }}</span>
        of
        <span class="font-medium text-gray-800">{{ paginationData.total }}</span>
        results
      </div>
      
      <nav class="flex items-center space-x-1">
        <!-- First Page Link -->
        <a 
          v-if="paginationData.links[0].url"
          :href="paginationData.links[0].url"
          @click.prevent="$inertia.visit(paginationData.links[0].url)"
          class="p-2 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors"
          title="First Page"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M15.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 010 1.414zm-6 0a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L5.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
          </svg>
        </a>
        
        <!-- Previous Page Link -->
        <a 
          v-if="paginationData.links[0].url"
          :href="paginationData.links[0].url"
          @click.prevent="$inertia.visit(paginationData.links[0].url)"
          class="p-2 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors"
          title="Previous"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>

        <!-- Page Number Links -->
        <template v-for="(link, index) in paginationData.links" :key="index">
          <a 
            v-if="index > 0 && index < paginationData.links.length - 1"
            :href="link.url"
            @click.prevent="$inertia.visit(link.url)"
            class="px-4 py-2 rounded-md border text-sm font-medium transition-colors"
            :class="{
              'border-indigo-500 bg-indigo-500 text-white': link.active,
              'border-gray-300 text-gray-700 hover:bg-gray-100': !link.active && link.url,
              'text-gray-400 cursor-not-allowed': !link.url
            }"
          >
            {{ link.label }}
          </a>
        </template>

        <!-- Next Page Link -->
        <a 
          v-if="paginationData.links[paginationData.links.length - 1].url"
          :href="paginationData.links[paginationData.links.length - 1].url"
          @click.prevent="$inertia.visit(paginationData.links[paginationData.links.length - 1].url)"
          class="p-2 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors"
          title="Next"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        
        <!-- Last Page Link -->
        <a 
          v-if="paginationData.links[paginationData.links.length - 1].url"
          :href="paginationData.links[paginationData.links.length - 1].url"
          @click.prevent="$inertia.visit(paginationData.links[paginationData.links.length - 1].url)"
          class="p-2 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors"
          title="Last Page"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" />
            <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div>
</template>