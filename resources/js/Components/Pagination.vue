<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    meta: Object,
});
</script>
<template>
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <a href="#"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Previous </a>
            <a href="#"
                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Next </a>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <p v-if="meta.links.length > 3" class="text-sm text-gray-700">
                Mostrando
                {{ ' ' }}
                <span class="font-medium">{{ meta.from }}</span>
                {{ ' ' }}
                a
                {{ ' ' }}
                <span class="font-medium">{{ meta.to }}</span>
                {{ ' ' }}
                de
                {{ ' ' }}
                <span class="font-medium">{{ meta.total }}</span>
                {{ ' ' }}
                resultados
            </p>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <div v-if="meta.links.length > 3">
                    <div class="flex flex-wrap -mb-1">
                        <template v-for="(link, key) in meta.links" :key="key">
                            <div v-if="link.url === null"
                                class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                v-html="link.label" />
                            <Link v-else
                                class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                :class="{ 'bg-gray-800 text-white': link.active }" :href="link.url"
                                v-html="link.label" />
                        </template>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>