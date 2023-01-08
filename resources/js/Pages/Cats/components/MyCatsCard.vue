<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    cat: Object,
});
</script>

<template>
    <div
        class="max-w-sm bg-stone-100 rounded-lg border border-gray-200 shadow-md"
    >
        <a :href="route('cats.show', cat.id)">
            <img
                class="rounded-t-lg w-full p-1"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbLgvs68buE4Lp7-__cIgt6Z8aFCpd3nuNzw&usqp=CAU"
                alt=""
            />
        </a>
        <div class="p-5">
            <div class="flex justify-between">
                <a href="#">
                    <h5
                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-600"
                    >
                        {{ cat.name }}
                    </h5>
                </a>
            </div>

            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <p class="text-base">Peso: {{ cat.weight }} Kg</p>
                <p class="text-base">Raça: {{ cat.breed }}</p>
                <p class="text-base">Idade: {{ cat.age }}</p>
            </div>
            <Link
                :href="route('cats.show', cat.id)"
                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Informações
                <svg
                    class="ml-2 -mr-1 w-4 h-4"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </Link>
        </div>
    </div>
</template>
