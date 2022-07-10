<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    cat: Object,
});
</script>


<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbLgvs68buE4Lp7-__cIgt6Z8aFCpd3nuNzw&usqp=CAU"
            alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ cat.name }}</div>
            <div>
                <p class="text-gray-700 text-base"> Peso: {{ cat.weight }} Kg</p>
                <p class="text-gray-700 text-base"> Raça: {{ cat.breed }}</p>
                <p class="text-gray-700 text-base"> Idade: {{ cat.age }}</p>
            </div>
        </div>
        <div class="px-6 pt-4 pb-2">
            <Link :href="route('cats.show', cat.id)" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            Informações</Link>
        </div>
    </div>
</template>