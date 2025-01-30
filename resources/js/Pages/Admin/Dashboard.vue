<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    projects: Array,
});
</script>

<template>
    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Admin Dashboard
                </h2>
                <Link
                    :href="route('admin.projects.create')"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    Create Project
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6"
                >
                    <!-- Projects List -->
                    <div class="grid gap-6 mb-8">
                        <div
                            v-if="projects.length === 0"
                            class="text-center text-gray-500"
                        >
                            No projects found.
                        </div>

                        <div
                            v-for="project in projects"
                            :key="project.id"
                            class="bg-white p-6 rounded-lg shadow border"
                        >
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3
                                        class="text-xl font-semibold text-gray-800"
                                    >
                                        {{ project.title }}
                                    </h3>
                                    <p class="mt-2 text-gray-600">
                                        {{ project.description }}
                                    </p>
                                    <div class="mt-4 flex gap-2">
                                        <span
                                            v-for="tag in project.tags"
                                            :key="tag.id"
                                            class="px-2 py-1 bg-gray-100 rounded-full text-sm text-gray-600"
                                        >
                                            {{ tag.name }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <Link
                                        :href="
                                            route(
                                                'admin.projects.edit',
                                                project.id
                                            )
                                        "
                                        class="text-indigo-600 hover:text-indigo-800"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        @click="deleteProject(project.id)"
                                        class="text-red-600 hover:text-red-800"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
