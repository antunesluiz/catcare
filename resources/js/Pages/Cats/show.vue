<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    cat: Object,
});
</script>

<template>
    <Head :title="cat.name" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ cat.name }}
            </h2>
        </template>
    </BreezeAuthenticatedLayout>
</template>