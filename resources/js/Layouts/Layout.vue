<script setup>

import Footer from "@/Layouts/Footer.vue";
import Header from "@/Layouts/Header.vue";
</script>

<template>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-950 selection:bg-red-500 selection:text-white"
    >
        <Header/>

        <div class="w-5/6 flex m-auto">
            <slot/>
        </div>

        <Footer/>
    </div>
</template>

<style scoped>

</style>
