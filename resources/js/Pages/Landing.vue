<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
const activeImage = ref(null);
const isAnimating = ref(false);
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
    <Head title="Home" />
    <div class="bg-white text-black">
        <div
            class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header>
                    <div
                        class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                    >
                        <div
                            class="flex justify-start items-center gap-4 pl-8 opacity-0 animate-fade-up"
                        >
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
                    <div class="flex flex-col items-center gap-8">
                        <img src="storage/img/projnear logo2.png" alt="" />
                        <div
                            class="flex flex-row items-center w-auto justify-center"
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
                    </div>
                </header>
            </div>
        </div>
    </div>
</template>
