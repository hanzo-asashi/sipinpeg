import fs from 'fs';
import { defineConfig } from 'vite';
import laravel, {refreshPaths} from 'laravel-vite-plugin';
import {homedir} from 'os';
import {resolve} from 'path';
import livewire from '@defstudio/vite-livewire-plugin';

let host = 'sipinpeg.local';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/filament.css',
                'resources/js/app.js'
            ],
            refresh: false,
        }),
        livewire({
            refresh: ['resources/css/filament.css', 'resources/js/app.js'],
        }),
    ],
    server: detectServerConfig(host)
});

function detectServerConfig(host) {
    let keyPath = resolve(homedir(), "D:/Development/laragon/etc/ssl/laragon.key");
    let certificatePath = resolve(homedir(), "D:/Development/laragon/etc/ssl/laragon.crt");

    if (!fs.existsSync(keyPath)) {
        return {}
    }

    if (!fs.existsSync(certificatePath)) {
        return {}
    }

    return {
        hmr: {host},
        host,
        https: {
            key: fs.readFileSync(keyPath),
            cert: fs.readFileSync(certificatePath),
        },
    }
}
