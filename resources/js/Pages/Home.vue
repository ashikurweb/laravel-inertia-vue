<template>
    <h1 class="text-5xl font-bold text-gray-600">
        Home Page {{ $page.props.auth.user.name ?? 'Guest' }}
    </h1>
</template>