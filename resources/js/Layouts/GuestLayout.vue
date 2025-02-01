<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const isLoading = ref(true);
const showContent = ref(false);
const activeImage = ref(null);
const isAnimating = ref(false);

defineProps({
    title: String,
});

onMounted(() => {
    setTimeout(() => {
        isLoading.value = false;
        setTimeout(() => {
            showContent.value = true;
        }, 100); // Small delay after loading ends
    }, 4000); // Loading duration
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}

const handleImageClick = (imageName) => {
    if (!isAnimating.value) {
        isAnimating.value = true;
        activeImage.value = imageName;

        // Reset after animation
        setTimeout(() => {
            activeImage.value = null;
            isAnimating.value = false;
        }, 300); // Match duration with CSS transition
    }
};
</script>
<template>
    <Head :title="title" />
    <!-- Loading Overlay -->
    <div
        v-if="isLoading"
        class="fixed inset-0 z-50 flex items-center justify-center bg-white"
    >
        <div class="flex space-x-8">
            <img
                src="/storage/img/web logotype.png"
                class="w-32 h-32 object-contain animate-fade-1"
                alt="Loading 1"
            />
            <img
                src="/storage/img/web logotype.png"
                class="w-32 h-32 object-contain animate-fade-2"
                alt="Loading 2"
            />
            <img
                src="/storage/img/web logotype.png"
                class="w-32 h-32 object-contain animate-fade-3"
                alt="Loading 3"
            />
        </div>
    </div>
    <div class="bg-white text-black">
        <div
            class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header>
                    <div
                        :class="[
                            'grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3',
                            showContent
                                ? 'opacity-100 transition delay-150 duration-1000 ease-out'
                                : 'opacity-0',
                        ]"
                    >
                        <div class="flex justify-start items-center gap-4 pl-8">
                            <img
                                class="h-10 w-auto"
                                src="storage\img\web logo icon.png"
                            />
                            <h1
                                class="text-center text-2xl font-goldman tracking-wide"
                            >
                                Project - N.E.A.R
                            </h1>
                        </div>
                    </div>
                    <div
                        :class="[
                            'flex flex-row items-center w-auto justify-center',
                            showContent
                                ? 'opacity-100 transition duration-1000 delay-300 ease-out translate-y-0'
                                : 'opacity-0 -translate-y-10',
                        ]"
                    >
                        <Link href="/">
                            <img
                                src="/storage/img/founder.png"
                                alt=""
                                width="103"
                                @click="handleImageClick('founder')"
                                :class="[
                                    'transition-all duration-300 cursor-pointer',
                                    activeImage === 'founder'
                                        ? 'scale-125'
                                        : activeImage
                                        ? 'opacity-50'
                                        : '',
                                ]"
                            />
                        </Link>

                        <Link href="/works"
                            ><img
                                src="/storage/img/works.png"
                                alt=""
                                width="150"
                                @click="handleImageClick('works')"
                                :class="[
                                    'transition-all duration-300 cursor-pointer',
                                    activeImage === 'works'
                                        ? 'scale-125'
                                        : activeImage
                                        ? 'opacity-50'
                                        : '',
                                ]"
                        /></Link>
                        <Link href="/contact"
                            ><img
                                src="/storage/img/contact.png"
                                alt=""
                                width="130"
                                @click="handleImageClick('contact')"
                                :class="[
                                    'transition-all duration-300 cursor-pointer',
                                    activeImage === 'contact'
                                        ? 'scale-125'
                                        : activeImage
                                        ? 'opacity-50'
                                        : '',
                                ]"
                        /></Link>
                    </div>
                </header>
                <main class="mt-6 font-goldman">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>

<style scoped>
.animate-fade-1 {
    animation: fade 1.2s ease-in-out infinite;
}

.animate-fade-2 {
    animation: fade 1.2s ease-in-out 0.4s infinite;
}

.animate-fade-3 {
    animation: fade 1.2s ease-in-out 0.8s infinite;
}

@keyframes fade {
    0%,
    100% {
        opacity: 0.3;
    }
    50% {
        opacity: 1;
    }
}

.transition-all {
    animation-iteration-count: 1;
}
</style>
