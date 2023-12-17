<template>
    <AppLayout>
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-2xl font-bold text-gray-900">
                Edit CV
            </h1>
            <form @submit.prevent="cvForm.put('/cv/' + cv.id + '/update')" class="border-4 border-gray-200 rounded-lg p-4 w-1/2">
                <h2 class="text-2xl font-bold text-gray-900 mb-5">
                    Main
                </h2>
                <!-- Success Message -->
                <div class="flex flex-col gap-3">
                    <div v-if="cvForm.recentlySuccessful" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        Updated successfully.
                    </div>
                    <div>
                        <div v-if="cvForm.errors.title" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ cvForm.errors.title }}
                        </div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" v-model="cvForm.title" autocomplete="false" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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

            <form @submit.prevent="personalDetailForm.post('/cv/' + cv.id + '/personal-detail/update')" class="border-4 border-gray-200 rounded-lg p-4 w-1/2">
                <!-- Form Fields -->
                <h2 class="text-2xl font-bold text-gray-900 mb-5">
                    Personal details
                </h2>
                <div class="flex flex-col gap-3">
                    <div v-if="personalDetailForm.recentlySuccessful" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        Updated successfully.
                    </div>
                    <div>
                        <div v-if="personalDetailForm.errors.first_name" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ personalDetailForm.errors.first_name }}
                        </div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                        <input type="text" v-model="personalDetailForm.first_name" autocomplete="false" id="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    </div>
                    <div>
                        <div v-if="personalDetailForm.errors.last_name" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ personalDetailForm.errors.last_name }}
                        </div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                        <input type="text" v-model="personalDetailForm.last_name" autocomplete="false" id="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <div v-if="personalDetailForm.errors.email" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ personalDetailForm.errors.email }}
                        </div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" v-model="personalDetailForm.email" autocomplete="false" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <div v-if="personalDetailForm.errors.phone" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ personalDetailForm.errors.phone }}
                        </div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" v-model="personalDetailForm.phone" autocomplete="false" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <div v-if="personalDetailForm.errors.address" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ personalDetailForm.errors.address }}
                        </div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" v-model="personalDetailForm.address" autocomplete="false" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mt-4" v-if="personalDetailForm.id">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import { useForm } from '@inertiajs/vue3';

export default {
    name: "EditCv",
    components: {
        AppLayout
    },
    props: {
        cv: Object
    },
    setup(props) {
        const cvForm = useForm({
            id: props.cv.id,
            title: props.cv.title,
            is_active: props.cv.is_active,
        });

        const personalDetailForm = useForm({
            id: props.cv.personal_detail.id,
            first_name: props.cv.personal_detail.first_name,
            last_name: props.cv.personal_detail.last_name,
            email: props.cv.personal_detail.email,
            phone: props.cv.personal_detail.phone,
            address: props.cv.personal_detail.address,
        });

        return {
            cvForm,
            personalDetailForm,
        };
    }
}
</script>

