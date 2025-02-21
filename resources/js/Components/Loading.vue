<script setup>
defineProps({
    show: {
        type: Boolean,
        default: true,
    },
});
</script>
<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <div class="flex space-x-8">
            <img
                src="/storage/img/web logotype.png"
                class="w-32 h-32 object-contain animate-pulse-fade"
                alt="Loading 1"
            />
            <img
                src="/storage/img/web logotype.png"
                class="w-32 h-32 object-contain animate-pulse-fade-delay-1"
                alt="Loading 2"
            />
            <img
                src="/storage/img/web logotype.png"
                class="w-32 h-32 object-contain animate-pulse-fade-delay-2"
                alt="Loading 3"
            />
        </div>
    </div>
</template>
