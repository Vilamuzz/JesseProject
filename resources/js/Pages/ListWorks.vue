<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
defineProps({
    projects: Array,
});
</script>
<template>
    <GuestLayout title="Works">
        <div class="grid grid-flow-row grid-cols-4 gap-6 mb-8">
            <div v-for="project in projects" :key="project.id" class="h-96">
                <Link :href="route('works.show', project.id)">
                    <img
                        v-if="project.background_image"
                        :src="'/storage/' + project.background_image"
                        :alt="project.title"
                        class="max-h-72 w-full object-cover"
                    />
                    <h3 class="text-xl font-semibold mt-2">
                        {{ project.title }}
                    </h3>
                    <div class="flex gap-2 mt-2">
                        <span
                            v-for="tag in project.tags"
                            :key="tag.id"
                            class="px-2 py-1 bg-gray-100 rounded-full text-sm text-gray-600"
                        >
                            {{ tag.name }}
                        </span>
                    </div>
                    <p class="text-gray-600 mt-2">{{ project.date }}</p>
                </Link>
            </div>
        </div>
    </GuestLayout>
</template>
