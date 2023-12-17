<template>
    <div class="bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <Link href="/">
                    <p class="text-3xl font-bold text-gray-900">CV-APP</p>
                </Link>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <slot/>
        </main>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'

export default {
    name: "AppLayout",
    components: {
        Link,
    }
}
</script>
