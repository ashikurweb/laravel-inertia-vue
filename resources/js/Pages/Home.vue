<script setup>
import Paginator from './Components/Paginator.vue';
import FlashBanner from './Components/FlashBanner.vue';


defineProps({
    users: Object,
})

const getUserImage = (image) => {
    return image ? '/images/users/' + image : '/assets/image/default.png'
}

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>

<template>
    <FlashBanner/>
    <h1 class="text-5xl font-bold text-gray-600 mb-8">
        Home Page
    </h1>

    <div class="overflow-x-auto shadow-[0_3px_5px_rgb(0,0,0,0.1)] rounded-lg">
        <table class="min-w-full bg-white border border-gray-100/70 rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Registration Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ user.id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <img class="w-12 h-12 rounded-full object-cover hover:ring hover:ring-slate-200 transition duration-300 ease-in-out"
                            :src="getUserImage(user.image)" alt="user avatar" />
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ user.email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ getDate(user.created_at) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="text-red-600 hover:text-red-900">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Paginator -->
        <Paginator :paginationData="users" />
    </div>
</template>