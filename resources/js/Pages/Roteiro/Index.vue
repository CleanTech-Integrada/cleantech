<script setup>
import Layout from "@/Layouts/Layout.vue";
import {Head, Link} from "@inertiajs/vue3";

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
                    class="card p-5 w-full bg-base-100 shadow-xl mb-2">
                    <div class="justify-between items-center flex">
                        <div>
                            <h2 class="card-title">Roteiro {{ roteiro.id }}</h2>
                        </div>
                        <div class="card-actions justify-end">
                            <Link :href="route('roteiros.show', roteiro)" class="btn btn-primary">Visualizar Roteiro</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
