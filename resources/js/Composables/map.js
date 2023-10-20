import {ref} from "vue";

export function useMap() {
    const points = ref([]);

    function addPoint(marker) {
        // Sim, esse código não é legal, PERDÃO!
        points.value.push([
            marker._latlng.lat,
            marker._latlng.lng,
            marker
        ]);
    }

    return { points, addPoint };
}
