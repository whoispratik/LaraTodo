<script setup lang="ts">
import Nav from '@/components/Nav.vue';
</script>

<template>
    <Nav/>
    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
        <slot/>
    </main>
</template>

