<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    project: Object,
});
</script>
<template>
    <Head :title="project.title" />
    <nav
        class="fixed top-0 left-0 w-full h-4 flex flex-row sm:px-6 lg:px-24 py-12 gap-8 items-center bg-white z-50"
    >
        <Link :href="route('works')"
            ><span
                class="bg-gray-400 text-white rounded-full p-4 flex items-center justify-center w-12 h-12 text-lg"
                ><</span
            ></Link
        >

        <h1 class="text-3xl font-bold">Work Page</h1>
    </nav>
    <div class="pt-24 w-full py-4">
        <!-- Project Header -->
        <div
            class="relative h-screen mb-8 flex flex-col"
            :style="{
                backgroundImage: `url('/storage/${project.background_image}')`,
                backgroundSize: 'cover',
                backgroundPosition: 'center',
            }"
        >
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Content -->
            <div class="relative z-10 text-white p-24">
                <p class="text-gray-200">{{ project.date }}</p>
                <h1 class="text-4xl font-bold mb-4 font-goldman">
                    {{ project.title }}
                </h1>
                <div class="flex flex-col mb-4">
                    <span
                        v-for="tag in project.tags"
                        :key="tag.id"
                        class="text-base font-bold"
                    >
                        | {{ tag.name }} |
                    </span>
                </div>
            </div>
        </div>

        <div class="container mx-auto">
            <!-- Project Images -->
            <div class="relative mt-24">
                <div class="absolute bottom-10 left-0 right-0">
                    <img
                        src="/storage/img/frame1 a.png"
                        alt=""
                        class="relative z-10"
                    />
                </div>

                <div>
                    <img
                        :src="
                            project.project_images?.[0]
                                ? '/storage/' +
                                  project.project_images[0].image_path
                                : ''
                        "
                        :alt="project.title"
                        class="w-full object-cover h-96 relative z-0"
                    />
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-transparent via-white/50 to-white z-0 mb-6"
                    ></div>
                </div>

                <!-- Teks tetap berada di bawah -->
                <p class="mt-4 text-center">{{ project.description }}</p>
            </div>

            <div v-if="project.project_images?.length" class="mb-12">
                <div class="flex flex-col gap-4">
                    <div
                        v-for="image in project.project_images.slice(1)"
                        :key="image.id"
                        class="relative flex items-center justify-center"
                    >
                        <img
                            :src="'/storage/' + image.image_path"
                            class="w-3/4 h-auto object-cover"
                            :alt="project.title"
                        />
                    </div>
                </div>
            </div>

            <!-- Additional Content Sections -->
            <div
                v-for="content in project.additional_contents"
                :key="content.id"
                class="flex flex-col gap-4 mb-12 items-center"
            >
                <h2 class="text-2xl font-bold mb-4">{{ content.type }}</h2>
                <p class="mb-4">{{ content.description }}</p>

                <!-- Content Images -->
                <div v-if="content.images?.length" class="flex flex-col gap-4">
                    <div
                        v-for="image in content.images"
                        :key="image.id"
                        class="relative flex items-center justify-center"
                    >
                        <img
                            :src="'/storage/' + image.image_path"
                            class="w-3/4 h-auto object-cover"
                            :alt="content.type"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
