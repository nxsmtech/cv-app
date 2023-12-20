<template>
    <form @submit.prevent="cvForm.put('/cv/' + cv.id + '/update')"
          class="border-4 border-gray-200 rounded-lg p-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-5">
            Main
        </h2>
        <!-- Success Message -->
        <div class="flex flex-col gap-3">
            <div v-if="cvForm.recentlySuccessful" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"
                 role="alert">
                Updated successfully.
            </div>
            <div>
                <div v-if="cvForm.errors.title" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ cvForm.errors.title }}
                </div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" v-model="cvForm.title" autocomplete="false" id="title"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="flex gap-2">
                <input type="checkbox" id="isActive" v-model="cvForm.is_active">
                <label for="isActive" class="block text-sm font-medium text-gray-700">Is Active</label>
            </div>
            <div class="mt-4" v-if="cvForm.id">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: 'Main',
    props: {
        cv: Object
    },
    setup(props) {
        const cvForm = useForm({
            id: props.cv.id,
            title: props.cv.title,
            is_active: props.cv.is_active,
        });

        return {
            cvForm,
        };
    }
}
</script>

<style scoped>

</style>
