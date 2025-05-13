<script setup>
import FlashBanner from './Components/FlashBanner.vue';

</script>

<template>

    <Head title="Dashboard" />
    <div>
        <FlashBanner />
        <h1 class="text-3xl font-bold text-lime-400"><span class="text-slate-700">Welcome back,</span> {{ $page.props.auth.user.name }}</h1>
    </div>
</template>