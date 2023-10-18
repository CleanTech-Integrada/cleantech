<script setup>
import * as Leaflet from 'leaflet/dist/leaflet.js';
import {onMounted, ref, watchEffect} from "vue";
import {useMap} from "@/Composables/map.js";
import {remove} from "leaflet/src/dom/DomUtil.js";

let map;
const {points, addPoint} = useMap();
const routeBtn = ref(null), routeTooltip = ref(null), noPoint = ref(null);

const props = defineProps({
    initialLatLng: {
        type: Array,
        default: [0, 0]
    },
    clients: {
        type: Array,
        default: []
    }
});

onMounted(() => {
    map = Leaflet.map('map').setView(props.initialLatLng, 13);

    Leaflet.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    map.on('click', (mouseEvent) => addMarker(mouseEvent.latlng));

    for (const marker of props.clients) {
        Leaflet.marker(marker.latlng, marker.options)
            .addTo(map)
            .on('click', () => {

            });
    }

    handleRouteButton(true);
});

watchEffect(() => {
    if (routeBtn.value) {
        handleRouteButton(points.value.length === 0);
    }
});

function handleRouteButton(disable) {
    if (disable) {
        routeBtn.value.disabled = true;
        routeTooltip.value.display = 'flex';
        routeTooltip.value.dataset.tip = 'Definia um ponto de inicio no mapa!';
        return;
    }

    routeBtn.value.disabled = false;
    routeTooltip.value.display = 'none';
    routeTooltip.value.dataset.tip = '';
}

function addMarker(latlng) {
    // if (points.value.length > 0 && typeof points.value[0] !== 'undefined') return;
    noPoint.value.remove();

    const marker = Leaflet.marker(latlng, {
        draggable: true
    });

    marker.addTo(map);
    addPoint(marker);
}

function removeMarker(marker, index) {
    map.removeLayer(marker);
    points.value.splice(index, 1);
}

</script>

<template>
    <div class="flex justify-between w-full" style="min-height: 650px">
        <div class="w-3/6">
            <div class="bg-base-200 p-2 rounded-xl h-full">
                <div id="map" class="min-h-full rounded-xl">
                </div>
            </div>
        </div>
        <div class="ms-5 w-3/6">
            <div>
                <div class="tooltip tooltip-bottom w-full" data-tip="hello" ref="routeTooltip">
                    <button class="w-full btn btn-active btn-success" ref="routeBtn">
                        Gerar Rotéiro
                    </button>
                </div>
            </div>
            <div class="bg-base-200 p-2 rounded-xl h-96 mt-4 overflow-y-scroll">
                <div class="bg-base-300 rounded-xl p-4 text-center" ref="noPoint">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-auto" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                    </svg>
                    <span>
                        Selecione um ponto de inicio no mapa.
                    </span>
                </div>
                <div
                    class="bg-base-300 flex rounded-xl p-4 text-center mb-2"
                    v-for="(point, index) in points"
                >
                    <div class="text-center shadow-md w-24 card bg-base-200">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="m-auto" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="m-3 text-start">
                        <span class="text-lg">
                            Ponto {{ index }}
                        </span>
                        <div>
                            <span class="text-green-500">Latitude:</span> {{ point._latlng.lat }}
                            <br>
                            <span class="text-green-500">Longitude:</span> {{ point._latlng.lng }}
                        </div>
                    </div>
                    <button
                        class="ms-auto border border-red-900 hover:bg-red-700 duration-75 hover:scale-90 text-center shadow-md w-24 card bg-base-200"
                        v-on:click="removeMarker(point, index)"
                    >
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="m-auto" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
