import vue from "@vitejs/plugin-vue"; // ✅ IMPORTAR O PLUGIN
import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    server: {
        host: true,
        port: 5174,
        strictPort: true,
    },
    plugins: [
        vue(),
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
