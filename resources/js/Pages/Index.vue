<template>
    <AppLayout>
        <div class="flex justify-between mb-2">
            <h1 class="text-2xl font-bold text-gray-900">
                CV List
            </h1>
            <button @click="addCv" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add CV
            </button>
        </div>
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-200 rounded-lg">
                <div v-for="cv in cvs" :key="cv.id"
                     class="flex items-center justify-between p-3 border-b border-gray-300">
                    <span class="text-lg font-medium text-gray-700">{{ cv.title }}</span>
                    <div>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
                            Open
                        </button>
                        <Link :href="'/cv/edit/' + cv.id">
                            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">
                                Edit
                            </button>
                        </Link>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "../Layouts/AppLayout.vue"
import {Link} from '@inertiajs/vue3'
import {router} from '@inertiajs/vue3'

export default {
    name: "Index",
    components: {
        AppLayout,
        Link
    },
    props: {
        cvs: {
            type: Array,
            required: true,
        }
    },
    methods: {
        addCv() {
            router.get('/cv/create');
        }
    }
}
</script>

