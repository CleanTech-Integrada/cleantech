<script setup>
defineProps({
    list: {
        type: Array
    }
});
</script>

<template>
    <div class="card w-2/6 bg-base-100 shadow-accent overflow-y-hidden">
        <div class="card-body">
            <div v-for="item in list" class="cursor-pointer hover:bg-gray-700 rounded-xl flex justify-between items-center p-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="pr-2 w-6 h-6">
                    <path
                        d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z"/>
                    <path
                        d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z"/>
                    <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"/>
                </svg>
                <p>{{ item.name }}</p>
                <span v-if="item.available" class="badge badge-success gap-2">
                    disponível
                </span>
                <span v-else class="badge badge-warning gap-2">
                    indisponível
                </span>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
