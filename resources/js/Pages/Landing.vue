<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>

<template>
    <GuestLayout title="Home">
        <main>
            <div class="mt-6 flex flex-col items-center">
                <img
                    src="/storage/img/icon1a.png"
                    alt=""
                    width="200"
                    class="relative z-10 top-12"
                />
                <h2 class="relative text-4xl z-0 font-orbitron font-bold">
                    About N.E.A.R
                </h2>
                <div class="flex justify-center items-center">
                    <img src="/storage/img/icon2 a.png" alt="" width="200" />
                    <p class="text-base text-gray-500 w-1/3 text-center">
                        Project N.E.A.R (Neo Experimental Artistic Research) is
                        a project that focusing on developing physical products
                        and graphics that combine media
                    </p>
                    <img src="/storage/img/icon2 a.png" alt="" width="200" />
                </div>
                <h2 class="text-4xl font-orbitron font-bold">Purpose</h2>
                <div class="flex flex-col justify-center items-center gap-y-4">
                    <p class="text-base text-gray-500 w-1/2 text-center mt-8">
                        N.E.A.R is a creative movement platform designed to face
                        and embrace the changing era in this technological era.
                        Based on artistic experimentation and research, the
                        project aims to:
                    </p>
                    <p class="text-base text-gray-500 w-1/2 text-center">
                        1. Inspire artists and creators to have the strength to
                        face the waves of technological progress and artificial
                        intelligence together.
                    </p>
                    <p class="text-base text-gray-500 w-1/2 text-center">
                        2. To be a space for multidisciplinary experimental art
                        that combines art, technology, and futuristic thinking.
                    </p>
                    <p class="text-base text-gray-500 w-1/2 text-center">
                        3. Produce works, discussions, and interests by
                        emphasizing collaboration between people with the same
                        vision.
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
                <p class="text-lg text-gray-500 w-1/2 text-center font-sans">
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
    </GuestLayout>
</template>
