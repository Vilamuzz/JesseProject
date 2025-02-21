<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
defineProps({
    projects: Array,
});
</script>
<template>
    <GuestLayout title="Works">
        <div class="grid grid-flow-row grid-cols-1 gap-6 mb-8">
            <div
                v-for="project in projects"
                :key="project.id"
                class="relative my-8 h-96 opacity-0 animate-fade animate-delay-[3900ms]"
            >
                <Link :href="route('works.show', project.id)">
                    <!-- <img
                        v-if="project.background_image"
                        :src="'/storage/' + project.background_image"
                        :alt="project.title"
                        class="max-h-72 w-full object-cover"
                    /> -->

                    <div class="absolute bottom-10 left-0 right-0">
                        <img
                            src="/storage/img/frame section.png"
                            alt=""
                            class="relative z-10"
                        />
                    </div>

                    <img
                        :src="'/storage/' + project.background_image"
                        :alt="project.title"
                        class="max-h-72 w-full object-cover"
                    />

                    <div
                        class="mx-auto flex flex-col items-center justify-center"
                    >
                        <h3 class="text-xl font-semibold mt-2 text-center">
                            {{ project.title }}
                        </h3>
                        <p class="text-gray-600 mt-2 text-center">
                            {{ project.date }}
                        </p>
                        <div class="flex gap-2 mt-2 justify-center">
                            <span
                                v-for="tag in project.tags"
                                :key="tag.id"
                                class="px-2 py-1 bg-gray-100 rounded-full text-sm text-gray-600"
                            >
                                {{ tag.name }}
                            </span>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </GuestLayout>
</template>
