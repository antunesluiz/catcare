<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';

import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';

import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    breed: '',
    birth: '',
    weight: '',
    picture: ''
});

const submit = () => {
    form.post(route('cats.store'));
};

</script>

<template>

    <Head title="Adicionar gato" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar gato
            </h2>
        </template>

        <BreezeValidationErrors class="mb-4" />

        <form id="create-cat-form" @submit.prevent="submit">
            <div>
                <BreezeLabel for="name" value="Nome" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="breed" value="Raça" />
                <BreezeInput id="breed" type="text" class="mt-1 block w-full" v-model="form.breed" required
                    autocomplete="breed" />
            </div>

            <div class="columns-2 mt-4">
                <div>
                    <BreezeLabel for="birth" value="Data de nascimento" />
                    <BreezeInput id="birth" type="date" class="mt-1 block w-full" v-model="form.birth" required
                        autocomplete="birth" />
                </div>

                <div>
                    <BreezeLabel for="weight" value="Peso" />
                    <BreezeInput id="weight" type="number" class="mt-1 block w-full" v-model="form.weight" required
                        autocomplete="weight" min="0" />
                </div>
            </div>

            <!-- <div class="grid grid-cols-2 flex flex-wrap mt-4">
                <div>
                    <BreezeLabel for="picture" value="Foto" />
                    <BreezeInput id="picture" type="file" class="mt-1 block w-full" v-model="form.picture" required
                        autocomplete="picture" />
                </div>
            </div> -->

            <div class="flex items-center justify-end mt-4">
                <BreezeButton form="create-cat-form" class="ml-4" :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Adicionar gato
                </BreezeButton>
            </div>
        </form>

    </BreezeAuthenticatedLayout>

</template>