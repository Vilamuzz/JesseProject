<script setup>
import Menu from "@/Components/Menu.vue";
import Loading from "@/Components/Loading.vue";
import Header from "@/Components/Header.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const isLoading = ref(true);

onMounted(() => {
    setTimeout(() => {
        isLoading.value = false;
    }, 3000);
});
</script>
<template>
    <Head title="Home" />
    <Loading v-if="isLoading" />
    <div class="bg-white text-black">
        <div
            class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <Header />
                <div
                    class="flex flex-col items-center gap-8 opacity-0 animate-fade animate-delay-[3700ms]"
                >
                    <img src="storage/img/projnear logo2.png" alt="" /><Menu />
                </div>
            </div>
        </div>
    </div>
</template>
