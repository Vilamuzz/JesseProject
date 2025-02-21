<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
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
    <div
        class="flex flex-row items-center w-auto justify-center opacity-0 animate-fade animate-delay-[3700ms]"
    >
        <Link href="/founder">
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
</template>
