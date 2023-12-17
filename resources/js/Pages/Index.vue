<template>
    <AppLayout>
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">CV list</h1>
                </div>
            </header>

            <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="flex justify-end mb-2">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add CV
                    </button>
                </div>
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 rounded-lg">
                        <div v-for="cv in cvs" :key="cv.id" class="flex items-center justify-between p-3 border-b border-gray-300">
                            <span class="text-lg font-medium text-gray-700">{{ cv.title }}</span>
                            <div>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Open</button>
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Edit</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
    </AppLayout>
</template>
<script>
import AppLayout from "../Layouts/AppLayout.vue";

export default {
    name: "Index",
    components: {
        AppLayout
    },
    props: {
        cvs: {
            type: Array,
            required: true,
        }
    }
}
</script>

