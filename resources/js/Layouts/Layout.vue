<script setup>
import Footer from "@/Layouts/Footer.vue";
</script>

<template>
    <div
        id="background-template"
        class="overflow-hidden relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-950 selection:bg-red-500 selection:text-white flex flex-col"
    >
        <slot/>

        <Footer/>
    </div>
</template>

<style scoped>

</style>
