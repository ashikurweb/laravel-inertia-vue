<script setup>
    defineProps({
        name: String
    });
</script>

<template>
    <Head title="About page" />
    <div>
        <h1 class="text-5xl font-bold text-gray-600">Welcome {{ name }}</h1>
    </div>
</template>