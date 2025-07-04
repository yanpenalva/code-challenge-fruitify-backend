<script setup>
defineProps(["show", "close", "form", "update"]);
</script>

<template>
    <div
        v-if="show"
        class="fixed inset-0 bg-black/50 flex items-center justify-center"
    >
        <div class="bg-white p-6 rounded w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Edit Contact</h2>

            <div v-if="form.errors.name" class="text-red-600 mb-2">
                {{ form.errors.name }}
            </div>
            <input
                v-model="form.name"
                placeholder="Name"
                class="w-full mb-2 p-2 border"
            />

            <div v-if="form.errors.email" class="text-red-600 mb-2">
                {{ form.errors.email }}
            </div>
            <input
                v-model="form.email"
                placeholder="Email"
                class="w-full mb-2 p-2 border"
            />

            <div v-if="form.errors.phone" class="text-red-600 mb-2">
                {{ form.errors.phone }}
            </div>
            <input
                v-model="form.phone"
                placeholder="Phone"
                class="w-full mb-4 p-2 border"
            />

            <div class="flex justify-end gap-2">
                <button @click="close" class="px-4 py-2 bg-gray-300 rounded">
                    Cancel
                </button>
                <button
                    @click="update(close)"
                    class="px-4 py-2 bg-blue-600 text-white rounded"
                >
                    Update
                </button>
            </div>
        </div>
    </div>
</template>
