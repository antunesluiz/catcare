<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import cardVue from './components/card.vue';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    cats: Object,
});

</script>

<template>

    <Head title="Meus gatos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meus gatos
            </h2>
        </template>

        <template #action>
            <Link :href="route('cats.create')"
                class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
            Adicionar Gato
            </Link>
        </template>

        <Pagination :meta="cats.meta" class="mb-2"></Pagination>

        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 flex flex-wrap">
            <cardVue v-for="cat in cats.data" :cat="cat" />
        </div>
    </BreezeAuthenticatedLayout>
</template>