<script setup></script>
<template>
    <Head :title="`${$page.component}`" />
    <h1 class="text-5xl font-bold text-gray-600">{{ $page.props.auth.name }}</h1>

    <Link 
        class="mt-[800px] block w-26 py-2 px-4 border border-slate-200 hover:bg-gray-200 transition-all duration-200" 
        :href="route('scroll.prevention')"
        preserve-scroll
        >
        Refressh
    </Link>
</template>