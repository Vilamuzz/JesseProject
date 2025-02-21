<script setup>
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Loading from "@/Components/Loading.vue";
import Header from "@/Components/Header.vue";
import Menu from "@/Components/Menu.vue";

defineProps({
    title: String,
});

const isLoading = ref(true);

onMounted(() => {
    setTimeout(() => {
        isLoading.value = false;
    }, 3000);
});
</script>

<template>
    <Head :title="title" />
    <Loading v-if="isLoading" />
    <div class="bg-white text-black">
        <div
            class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <Header />
                <Menu />
                <main class="mt-6 font-goldman mx-8">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
