<script setup>
import Layout from "@/Layouts/Layout.vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({
    roteiros: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Layout>
        <Head title="Roteiros"/>

        <div class="w-5/6 h-4/6 m-auto mt-5" style="max-height: 600px; overflow: scroll">
            <div>
                <div
                    v-for="roteiro in roteiros"
                    class="card p-5 w-96 bg-base-100 shadow-xl mb-2">
                    <div class="justify-between items-center flex">
                        <div>
                            <h2 class="card-title">Roteiro {{ roteiro.id }}</h2>
                            <span class="ms-1">{{ roteiro.created_at }}</span>
                        </div>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
