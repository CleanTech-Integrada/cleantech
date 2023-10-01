<script setup>
import {Head} from '@inertiajs/vue3';
import Layout from "@/Layouts/Layout.vue";

</script>

<template>
    <Head title="Welcome"/>

    <Layout>
        <div class="w-5/6 h-4/6 m-auto mt-5">
            <div class="mb-8 pb-3 w-full">
                <div class="rounded-xl navbar bg-neutral text-neutral-content">
                    <a class="btn btn-ghost normal-case text-xl">Sobre nós</a>
                </div>
            </div>

            <div class="grid grid-flow-col flex justify-between gap-5 w-full">
                <div class="card bg-base-100 shadow-xl">
                    <figure><img src="https://media.licdn.com/dms/image/D4D03AQHy9gqzrp2lMA/profile-displayphoto-shrink_800_800/0/1692898542753?e=1701907200&v=beta&t=Sru_sB9e6-0ZZi6XQc7AIJjqci4U-tTuNtRm2twoStk" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Pedro Xavier</h2>
                        <p>Estudante de Ciência da Computação </p>
                    </div>
                </div>
                <div class="card  bg-base-100 shadow-xl">
                    <figure><img src="https://media.licdn.com/dms/image/C5603AQHhTbGWaRlOCA/profile-displayphoto-shrink_800_800/0/1607713266798?e=1701907200&v=beta&t=dB1BLnFHovyiXQVcc7yUFF94vvOmA3HDXFcfPp1NHcg" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Aderson Silva</h2>
                        <p>Estudante de Ciência da Computação </p>
                    </div>
                </div>
                <div class="card  bg-base-100 shadow-xl">
                    <figure><img src="https://media.licdn.com/dms/image/D4D03AQHfw4yXEYhN-A/profile-displayphoto-shrink_800_800/0/1686605959115?e=1701907200&v=beta&t=3pHCjumbQBETU9hJQhZrZBmOrHccJucyROzw2h-AJsE" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">João Belone</h2>
                        <p>Estudante de Ciência da Computação </p>
                    </div>
                </div>
                <div class="card  bg-base-100 shadow-xl">
                    <figure><img src="https://media.licdn.com/dms/image/C5603AQHZ8DBk63wGxw/profile-displayphoto-shrink_800_800/0/1645708379419?e=1701907200&v=beta&t=H_lLfdgHOjLqFYpVvMYWCUE7aVMOHYIpu-gG2qk8Rnw" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Sergio Kenji</h2>
                        <p>Estudante de Ciência da Computação </p>
                    </div>
                </div>
                <div class="card  bg-base-100 shadow-xl">
                    <figure><img src="https://media.licdn.com/dms/image/C4D03AQGZwHgyP988ig/profile-displayphoto-shrink_800_800/0/1660575132177?e=1701907200&v=beta&t=TRaa9VyzkfCYkX9RQ3bCDBcOPGDVp5DB-aiGtR9s8zg" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Gustavo Nakamura</h2>
                        <p>Estudante de Ciência da Computação </p>
                    </div>
                </div>
            </div>

            </div>
    </Layout>
</template>

<style>
</style>
