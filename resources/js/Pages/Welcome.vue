<script setup>
import {Head} from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";
import Map from "@/Components/Map.vue";
</script>

<template>
    <Head title="Welcome"/>

    <Layout>
        <div class="w-5/6 h-4/6 m-auto mt-5">
            <Map
                :markers="[
                        {
                            latlng: ['10', '10'],
                            options: {}
                        }
                    ]"
                :initial-lat-lng="[-23.304453, -51.169582]"/>
        </div>
    </Layout>
</template>

<style>
</style>
