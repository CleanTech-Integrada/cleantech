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
        <div class="flex justify-between w-full">
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
            <Map />
        </div>
    </Layout>
</template>

<style>
</style>
