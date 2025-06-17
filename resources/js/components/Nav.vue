<template>
    <nav class="w-full border-b border-[#19140015] dark:border-[#ffffff0f] px-4 py-3 sm:px-6">
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-end">
                <div class="flex items-center gap-4">
                    <template v-if="user">
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="inline-flex items-center justify-center rounded-md border border-[#19140035] bg-white px-4 py-2 text-sm font-medium text-[#1b1b18] shadow-sm transition-all hover:bg-gray-50 hover:border-[#1915014a] dark:bg-[#1a1a1a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b] dark:hover:bg-[#252525]"
                        >
                            Logout
                        </Link>
                    </template>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="inline-flex items-center justify-center rounded-md px-4 py-2 text-sm font-medium text-[#1b1b18] transition-all hover:bg-[#19140010] dark:text-[#EDEDEC] dark:hover:bg-[#ffffff0f]"
                        >
                            Log in
                        </Link>
                        <Link
                            :href="route('register')"
                            class="inline-flex items-center justify-center rounded-md border border-[#19140035] bg-white px-4 py-2 text-sm font-medium text-[#1b1b18] shadow-sm transition-all hover:bg-gray-50 hover:border-[#1915014a] dark:bg-[#1a1a1a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b] dark:hover:bg-[#252525]"
                        >
                            Register
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>
<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
</script>