<template>
    <form @submit.prevent="personalDetailForm.post('/cv/' + cvId + '/personal-detail/update')"
          class="border-4 border-gray-200 rounded-lg p-4">
        <!-- Form Fields -->
        <h2 class="text-2xl font-bold text-gray-900 mb-5">
            Personal details
        </h2>
        <div class="flex flex-col gap-3">
            <div v-if="personalDetailForm.recentlySuccessful"
                 class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                Updated successfully.
            </div>
            <div>
                <div v-if="personalDetailForm.errors.first_name"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ personalDetailForm.errors.first_name }}
                </div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" v-model="personalDetailForm.first_name" autocomplete="false" id="first_name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <div v-if="personalDetailForm.errors.last_name"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ personalDetailForm.errors.last_name }}
                </div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" v-model="personalDetailForm.last_name" autocomplete="false" id="last_name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <div v-if="personalDetailForm.errors.email" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ personalDetailForm.errors.email }}
                </div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" v-model="personalDetailForm.email" autocomplete="false" id="email"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <div v-if="personalDetailForm.errors.phone" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ personalDetailForm.errors.phone }}
                </div>
                <label for="email" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" v-model="personalDetailForm.phone" autocomplete="false" id="email"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <div v-if="personalDetailForm.errors.address"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ personalDetailForm.errors.address }}
                </div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" v-model="personalDetailForm.address" autocomplete="false" id="address"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mt-4" v-if="personalDetailForm">
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
    name: 'PersonalDetail',
    props: {
        cvId: {
            type: Number,
            required: true,
        },
        personalDetail: {
            type: Object,
            required: false,
        }
    },
    setup(props) {
        const personalDetailForm = useForm({
            id: props.personalDetail?.id,
            first_name: props.personalDetail?.first_name,
            last_name: props.personalDetail?.last_name,
            email: props.personalDetail?.email,
            phone: props.personalDetail?.phone,
            address: props.personalDetail?.address,
        });

        return {
            personalDetailForm,
        };
    }
}
</script>

<style scoped>

</style>
