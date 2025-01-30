<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    project: Object,
    tags: Array,
});

const form = useForm({
    title: props.project.title,
    description: props.project.description,
    date: props.project.date,
    background_image: null,
    project_images: [],
    tags: props.project.tags.map((tag) => tag.name),
    additional_contents: props.project.additional_contents
        ? props.project.additional_contents.map((content) => ({
              id: content.id,
              title: content.type,
              content: content.description,
              images: [],
          }))
        : [{ title: "", content: "", images: [] }],
    _method: "PUT",
});

const submit = () => {
    form.post(route("admin.projects.update", props.project.id));
};

const addTag = (e) => {
    if (e.key === "Enter" && e.target.value) {
        e.preventDefault();
        const newTag = e.target.value.trim();
        if (!form.tags.includes(newTag)) {
            form.tags.push(newTag);
        }
        e.target.value = "";
    }
};

const removeTag = (index) => {
    form.tags.splice(index, 1);
};

const addContent = () => {
    form.additional_contents.push({
        title: "",
        content: "",
        images: [],
    });
};

const removeContent = (index) => {
    form.additional_contents.splice(index, 1);
};
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6"
                >
                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Title -->
                        <div>
                            <InputLabel for="title" value="Title" />
                            <TextInput
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                :message="form.errors.title"
                                class="mt-2"
                            />
                        </div>

                        <!-- Description -->
                        <div>
                            <InputLabel for="description" value="Description" />
                            <textarea
                                id="description"
                                v-model="form.description"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                rows="4"
                                required
                            ></textarea>
                            <InputError
                                :message="form.errors.description"
                                class="mt-2"
                            />
                        </div>

                        <!-- Date -->
                        <div>
                            <InputLabel for="date" value="Date" />
                            <TextInput
                                id="date"
                                v-model="form.date"
                                type="date"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                :message="form.errors.date"
                                class="mt-2"
                            />
                        </div>

                        <!-- Background Image -->
                        <div>
                            <InputLabel
                                for="background_image"
                                value="Background Image"
                            />
                            <div
                                v-if="project.background_image"
                                class="mt-2 mb-2"
                            >
                                <img
                                    :src="
                                        '/storage/' + project.background_image
                                    "
                                    class="w-32 h-32 object-cover"
                                    alt="Current background image"
                                />
                            </div>
                            <input
                                type="file"
                                id="background_image"
                                @input="
                                    form.background_image =
                                        $event.target.files[0]
                                "
                                class="mt-1 block w-full"
                                accept="image/*"
                            />
                            <InputError
                                :message="form.errors.background_image"
                                class="mt-2"
                            />
                        </div>

                        <!-- Project Images -->
                        <div>
                            <InputLabel
                                for="project_images"
                                value="Project Images"
                            />
                            <div
                                v-if="project.project_images?.length"
                                class="mt-2 mb-2 flex gap-2"
                            >
                                <div
                                    v-for="image in project.project_images"
                                    :key="image.id"
                                    class="relative"
                                >
                                    <img
                                        :src="'/storage/' + image.image_path"
                                        class="w-32 h-32 object-cover"
                                        alt="Project image"
                                    />
                                </div>
                            </div>
                            <input
                                type="file"
                                id="project_images"
                                @input="
                                    form.project_images = Array.from(
                                        $event.target.files
                                    )
                                "
                                class="mt-1 block w-full"
                                accept="image/*"
                                multiple
                            />
                            <InputError
                                :message="form.errors.project_images"
                                class="mt-2"
                            />
                        </div>

                        <!-- Tags -->
                        <div class="mt-4">
                            <InputLabel value="Tags" />
                            <div class="flex flex-wrap gap-2 mb-2">
                                <div
                                    v-for="(tag, index) in form.tags"
                                    :key="index"
                                    class="bg-gray-200 px-2 py-1 rounded-md flex items-center"
                                >
                                    {{ tag }}
                                    <button
                                        @click="removeTag(index)"
                                        type="button"
                                        class="ml-2 text-red-500"
                                    >
                                        &times;
                                    </button>
                                </div>
                            </div>
                            <TextInput
                                type="text"
                                @keydown.enter="addTag"
                                placeholder="Type and press Enter to add tags"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors.tags"
                                class="mt-2"
                            />
                        </div>

                        <!-- Additional Contents Section -->
                        <div class="mt-4">
                            <InputLabel value="Additional Contents" />
                            <div
                                v-for="(
                                    content, index
                                ) in form.additional_contents"
                                :key="index"
                                class="mt-4 p-4 border rounded-md"
                            >
                                <div
                                    class="flex justify-between items-center mb-2"
                                >
                                    <h3 class="font-medium">
                                        Section {{ index + 1 }}
                                    </h3>
                                    <button
                                        @click="removeContent(index)"
                                        type="button"
                                        class="text-red-500 hover:text-red-700"
                                    >
                                        &times;
                                    </button>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <InputLabel
                                            :for="'content-title-' + index"
                                            value="Section Title"
                                        />
                                        <TextInput
                                            :id="'content-title-' + index"
                                            v-model="content.title"
                                            type="text"
                                            class="mt-1 block w-full"
                                        />
                                    </div>
                                    <div>
                                        <InputLabel
                                            :for="'content-body-' + index"
                                            value="Content"
                                        />
                                        <textarea
                                            :id="'content-body-' + index"
                                            v-model="content.content"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            rows="3"
                                        ></textarea>
                                    </div>
                                    <div>
                                        <InputLabel
                                            :for="'content-images-' + index"
                                            value="Section Images"
                                        />
                                        <!-- Show existing images -->
                                        <div
                                            v-if="
                                                project.additional_contents?.[
                                                    index
                                                ]?.images?.length
                                            "
                                            class="mt-2 mb-2 flex gap-2"
                                        >
                                            <div
                                                v-for="image in project
                                                    .additional_contents[index]
                                                    .images"
                                                :key="image.id"
                                                class="relative"
                                            >
                                                <img
                                                    :src="
                                                        '/storage/' +
                                                        image.image_path
                                                    "
                                                    class="w-32 h-32 object-cover"
                                                    alt="Section image"
                                                />
                                            </div>
                                        </div>
                                        <input
                                            type="file"
                                            :id="'content-images-' + index"
                                            @input="
                                                content.images = Array.from(
                                                    $event.target.files
                                                )
                                            "
                                            class="mt-1 block w-full"
                                            accept="image/*"
                                            multiple
                                        />
                                    </div>
                                </div>
                            </div>
                            <button
                                @click="addContent"
                                type="button"
                                class="mt-4 text-indigo-600 hover:text-indigo-800"
                            >
                                + Add More Content
                            </button>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Update Project
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
