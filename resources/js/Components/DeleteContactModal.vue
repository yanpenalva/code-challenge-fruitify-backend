<script setup>
defineProps(["show", "close", "selected", "destroy"]);
</script>

<template>
    <div
        v-if="show"
        class="fixed inset-0 bg-black/50 flex items-center justify-center"
    >
        <div class="bg-white p-6 rounded w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Delete Contact</h2>
            <p v-if="selected">
                Are you sure you want to delete
                <strong>{{ selected.name }}</strong
                >?
            </p>
            <div class="flex justify-end gap-2 mt-4">
                <button @click="close" class="px-4 py-2 bg-gray-300 rounded">
                    Cancel
                </button>
                <button
                    @click="destroy(close)"
                    class="px-4 py-2 bg-red-600 text-white rounded"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>
