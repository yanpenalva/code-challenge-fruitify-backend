<script setup></script>
<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"></div>
        </header>

        <main class="flex-1 max-w-7xl mx-auto p-6">
            <slot />
        </main>
    </div>
</template>
