<script setup>
import {Head, Link} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import * as L from "leaflet/dist/leaflet.js";
import 'leaflet-routing-machine/dist/leaflet-routing-machine.js';
import Layout from "@/Layouts/Layout.vue";

const props = defineProps({
    roteiro: {
        type: Object,
        required: true
    }
});

let map;
const km = ref(null), time = ref(null);

onMounted(() => {
    const pontos = JSON.parse(props.roteiro.pontos);

    map = L.map('map').setView(pontos[0], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        draggable: false,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    map.setZoom(14);

    let waypoints = [];

    for (const marker of pontos) {
        L.marker(marker).addTo(map);
        waypoints.push(L.latLng(marker[0], marker[1]));
    }

    const routeControl = L.Routing.control({
        waypoints: waypoints,
        routeWhileDragging: false,
    }).addTo(map);
    routeControl.on('routesfound', (e) => {
        let routes = e.routes;
        let summary = routes[0].summary;
        for (const summaryElement of routes) {
            console.log(summaryElement.summary.totalDistance / 1000)
        }
        km.value.innerHTML = parseFloat(summary.totalDistance / 1000).toFixed(2);
        time.value.innerHTML = Math.round(summary.totalTime % 360 / 60);
    });

    removeCollapser();
});

// Remove collapser of leaflet
function removeCollapser() {
    const collapser = document.querySelector('.leaflet-routing-collapsible');
    collapser.remove();
}

</script>

<template>
    <Layout>

        <Head title="Roteiro" />

        <div class="w-5/6 h-4/6 m-auto mt-5">
            <div>
                <Link :href="route('roteiros.index')" class="btn btn-outline btn-info mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-5 w-5"
                         viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                    Voltar
                </Link>
                <div class="flex justify-between w-full" style="min-height: 600px">
                    <div class="w-3/6">
                        <div class="bg-base-200 p-2 rounded-xl h-full">
                            <div id="map" class="min-h-full rounded-xl">
                            </div>
                        </div>
                    </div>
                    <div class="ms-5 w-3/6 card">
                        <div class="card w-full bg-base-100 shadow-xl">
                            <div class="card-body">
                                <div class="badge badge-secondary mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="w-3 h-3 me-1" viewBox="0 0 16 16">
                                        <path
                                            d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                                    </svg>
                                    Transporte Sugerido
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-10 h-10" viewBox="0 0 16 16">
                                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                    <span class="ms-2">Caminhão</span>
                                </div>
                            </div>
                        </div>
                        <div class="stats shadow mt-5 ">
                            <div class="stat">
                                <div class="stat-figure text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                        class="bi bi-sign-turn-right" viewBox="0 0 16 16">
                                        <path
                                            d="M5 8.5A2.5 2.5 0 0 1 7.5 6H9V4.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L9.41 8.658A.25.25 0 0 1 9 8.466V7H7.5A1.5 1.5 0 0 0 6 8.5V11H5V8.5Z" />
                                        <path fill-rule="evenodd"
                                            d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435Zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134Z" />
                                    </svg>
                                </div>
                                <div class="stat-title">Distancia </div>
                                <div class="stat-value text-primary">
                                    <span ref="km"></span> KM
                                </div>
                                <div class="stat-desc">distancia entre os pontos</div>
                            </div>
                            <div class="stat">
                                <div class="stat-figure text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                        class="bi bi-stopwatch" viewBox="0 0 16 16">
                                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                        <path
                                            d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                                    </svg>
                                </div>
                                <div class="stat-title">Tempo</div>
                                <div class="stat-value text-secondary">
                                    <span ref="time"></span> min.
                                </div>
                                <div class="stat-desc">a uma média de 40km/h</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
</style>
