<script setup>
import * as Leaflet from 'leaflet/dist/leaflet.js';
import {onMounted} from "vue";

onMounted(() => {
    let map = Leaflet.map('map').setView([51.505, -0.09], 13);

    Leaflet.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
});

</script>

<template>
    <div class="bg-base-200 p-2 rounded-xl w-3/5">
        <div id="map" class="min-h-full rounded-xl">
        </div>
    </div>
</template>

<style scoped>

</style>
