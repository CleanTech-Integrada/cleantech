import {ref} from "vue";

export function useMap() {
    const points = ref([]);

    function addPoint(point) {
        points.value.push(point);
    }

    return { points, addPoint };
}
