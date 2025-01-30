<script setup>
import { Head, Link } from "@inertiajs/vue3";

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
    <Head :title="title" />

    <header
        :class="[
            'grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3',
            showContent
                ? 'opacity-100 transition delay-150 duration-1000 ease-out'
                : 'opacity-0',
        ]"
    >
        <div class="flex justify-start items-center gap-4 pl-8">
            <img class="h-10 w-auto" src="storage\img\web logo icon.png" />
            <h1 class="text-center text-2xl font-goldman tracking-wide">
                Project - N.E.A.R
            </h1>
        </div>
    </header>
    <div
        :class="[
            'flex flex-row items-center w-auto justify-center mt-6 font-goldman',
            showContent
                ? 'opacity-100 transition duration-1000 delay-300 ease-out translate-y-0'
                : 'opacity-0 -translate-y-10',
        ]"
    >
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
        <img
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
        />
        <img
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
        />
    </div>
</template>
