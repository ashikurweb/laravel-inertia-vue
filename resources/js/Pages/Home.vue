<script setup></script>
<template>
    <Head :title="`${$page.component}`" />
    <h1 class="text-5xl font-bold text-gray-600">{{ $page.props.auth.name }}</h1>
</template>