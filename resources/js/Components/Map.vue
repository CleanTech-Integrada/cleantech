<script setup>
import { Loader } from '@googlemaps/js-api-loader';

const loader = new Loader({
    apiKey: "AIzaSyCCn1owwNSFIioIKHwpWOI1RqFc3HYTK8Y",
    version: "weekly",
    libraries: ["places"]
});

const mapOptions = {
    center: {
        lat: 0,
        lng: 0
    },
    zoom: 4
};


loader
    .importLibrary('maps')
    .then(({Map}) => {
        let map = new Map(document.getElementById("map"), mapOptions);

        loader
            .importLibrary('marker')
            .then(({AdvancedMarkerElement}) => {
                const position = { lat: -25.344, lng: 131.031 };

                new AdvancedMarkerElement({
                    map: map,
                    position: position,
                    title: "Uluru",
                });
            });
    });


</script>

<template>
    <div class="bg-base-200 p-2 rounded-xl w-3/5">
        <div id="map" style="height: 500px;" class="rounded-xl">
        </div>
    </div>
</template>

<style scoped>

</style>
