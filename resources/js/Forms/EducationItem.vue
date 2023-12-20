<template>
    <div class="border-4 border-gray-200 rounded-lg p-4 mb-4">
        <form @submit.prevent="educationForm.post('/cv/' + cvId + '/education/update')">
            <div class="flex flex-col gap-3">
                <div v-if="educationForm.recentlySuccessful"
                     class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    Updated successfully.
                </div>
                <div>
                    <label :for="'institution-' + index"
                           class="block text-sm font-medium text-gray-700">Institution</label>
                    <input type="text" v-model="educationForm.institution" :id="'institution-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'grade-' + index"
                           class="block text-sm font-medium text-gray-700">Grade</label>
                    <input type="text" v-model="educationForm.grade" :id="'grade-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'specialization-' + index"
                           class="block text-sm font-medium text-gray-700">Specialization</label>
                    <input type="text" v-model="educationForm.specialization" :id="'specialization-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'start_date-' + index"
                           class="block text-sm font-medium text-gray-700">Start date</label>
                    <input type="text" v-model="educationForm.start_date" :id="'start_date-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'end_date-' + index"
                           class="block text-sm font-medium text-gray-700">End date</label>
                    <input type="text" v-model="educationForm.end_date" :id="'end_date-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'status-' + index"
                           class="block text-sm font-medium text-gray-700">Status</label>
                    <input type="text" v-model="educationForm.status" :id="'status-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="flex justify-start gap-2">
                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Update
                    </button>
                    <button @click.prevent="deleteEducation"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import {router, useForm} from "@inertiajs/vue3";
import {reactive} from 'vue'

export default {
    name: 'EducationItem',
    props: {
        cvId: {
            type: Number,
            required: true
        },
        education: Object,
        index: Number
    },
    setup(props, {emit}) {
        const educationForm = useForm({
            id: props.education?.id,
            institution: props.education?.institution,
            grade: props.education?.grade,
            specialization: props.education?.specialization,
            start_date: props.education?.start_date,
            end_date: props.education?.end_date,
            status: props.education?.status,
        });

        function deleteEducation() {
            const educationId = educationForm.id

            if (educationId) {
                router.delete('/education/' + educationId + '/delete')
            }

            emit('delete-education', props.index)
        }

        return {
            deleteEducation,
            educationForm,
            cvId: props.cvId
        };
    }
}
</script>
