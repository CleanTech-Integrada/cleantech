<script setup>
import {Head} from '@inertiajs/vue3';
import CardList from "@/Components/CardList.vue";
import Layout from "@/Layouts/Layout.vue";
import Map from "@/Components/Map.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome"/>

    <Layout>
        <div class="w-5/6 h-4/6 m-auto mt-5">
            <div class="flex justify-between w-full" style="min-height: 600px">
                <CardList :list="[
                  { name: 'Caminhão 1', available: true },
                  { name: 'Caminhão 2', available: false },
                  { name: 'Caminhão 3', available: true },
                  { name: 'Caminhão 4', available: false },
                  { name: 'Caminhão 5', available: true },
                  { name: 'Caminhão 6', available: false },
                  { name: 'Caminhão 7', available: true },
                  { name: 'Caminhão 8', available: true },
                  { name: 'Caminhão 9', available: false },
                  { name: 'Caminhão 10', available: true }
                ]"/>

                <Map/>
            </div>
        </div>
    </Layout>
</template>

<style>
</style>
