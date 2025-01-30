<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const isLoading = ref(true);
const showContent = ref(false);

onMounted(() => {
    setTimeout(() => {
        isLoading.value = false;
        setTimeout(() => {
            showContent.value = true;
        }, 100); // Small delay after loading ends
    }, 4000); // Loading duration
});

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}

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

    <!-- Existing content -->
    <div class="bg-white text-black">
        <div
            class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
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
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>
                <div
                    :class="[
                        'flex flex-row items-center w-auto justify-center',
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

                <main class="mt-6 font-goldman">
                    <div class="mt-6 flex flex-col items-center">
                        <img
                            src="/storage/img/icon1a.png"
                            alt=""
                            width="200"
                            class="relative z-10 top-12"
                        />
                        <h2
                            class="relative text-4xl z-0 font-orbitron font-bold"
                        >
                            About N.E.A.R
                        </h2>
                        <div class="flex justify-center items-center">
                            <img
                                src="/storage/img/icon2 a.png"
                                alt=""
                                width="200"
                            />
                            <p
                                class="text-base text-gray-500 w-1/3 text-center"
                            >
                                Project N.E.A.R (Neo Experimental Artistic
                                Research) is a project that focusing on
                                developing physical products and graphics that
                                combine media
                            </p>
                            <img
                                src="/storage/img/icon2 a.png"
                                alt=""
                                width="200"
                            />
                        </div>
                        <h2 class="text-4xl font-orbitron font-bold">
                            Purpose
                        </h2>
                        <div
                            class="flex flex-col justify-center items-center gap-y-4"
                        >
                            <p
                                class="text-base text-gray-500 w-1/2 text-center mt-8"
                            >
                                N.E.A.R is a creative movement platform designed
                                to face and embrace the changing era in this
                                technological era. Based on artistic
                                experimentation and research, the project aims
                                to:
                            </p>
                            <p
                                class="text-base text-gray-500 w-1/2 text-center"
                            >
                                1. Inspire artists and creators to have the
                                strength to face the waves of technological
                                progress and artificial intelligence together.
                            </p>
                            <p
                                class="text-base text-gray-500 w-1/2 text-center"
                            >
                                2. To be a space for multidisciplinary
                                experimental art that combines art, technology,
                                and futuristic thinking.
                            </p>
                            <p
                                class="text-base text-gray-500 w-1/2 text-center"
                            >
                                3. Produce works, discussions, and interests by
                                emphasizing collaboration between people with
                                the same vision.
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-center items-center mt-16 gap-y-4"
                    >
                        <img src="/storage/img/alert.png" alt="" class="h-24" />
                        <h3 class="text-2xl tracking-widest font-sans">
                            - OPERATION -
                        </h3>
                        <h2 class="text-8xl font-goldman font-bold">M.A.G.I</h2>
                        <p
                            class="text-lg text-gray-500 w-1/2 text-center font-sans"
                        >
                            Test
                        </p>
                        <div class="flex flex-row items-center gap-8">
                            <div class="flex flex-col items-center gap-y-4">
                                <img
                                    src="/storage/img/first child.png"
                                    alt=""
                                    class="h-24"
                                />
                                <h5 class="text-gray-500 font-sans italic">
                                    The Originator
                                </h5>
                                <p class="font-sans text-sm">Test</p>
                            </div>
                            <div class="flex flex-col items-center gap-y-4">
                                <img
                                    src="/storage/img/second child.png"
                                    alt=""
                                    class="h-24"
                                />
                                <h5 class="text-gray-500 font-sans italic">
                                    The Originator
                                </h5>
                                <p class="font-sans text-sm">Test</p>
                            </div>
                            <div class="flex flex-col items-center gap-y-4">
                                <img
                                    src="/storage/img/third child.png"
                                    alt=""
                                    class="h-24"
                                />
                                <h5 class="text-gray-500 font-sans italic">
                                    The Originator
                                </h5>
                                <p class="font-sans text-sm">Test</p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                ></footer>
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
