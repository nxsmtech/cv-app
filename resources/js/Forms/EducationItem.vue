<template>
    <div class="border-4 border-gray-200 rounded-lg p-4 mb-4">
        <div class="flex flex-col gap-3">
            <div v-if="educationForm.recentlySuccessful"
                 class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                Updated successfully.
            </div>
            <div>
                <div v-if="educationForm.errors.institution"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ educationForm.errors.institution }}
                </div>
                <label :for="'institution-' + index"
                       class="block text-sm font-medium text-gray-700">Institution</label>
                <input type="text" v-model="educationForm.institution" :id="'institution-' + index"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <div v-if="educationForm.errors.grade"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ educationForm.errors.grade }}
                </div>
                <label :for="'grade-' + index"
                       class="block text-sm font-medium text-gray-700">Grade</label>
                <input type="text" v-model="educationForm.grade" :id="'grade-' + index"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <div v-if="educationForm.errors.specialization"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ educationForm.errors.specialization }}
                </div>
                <label :for="'specialization-' + index"
                       class="block text-sm font-medium text-gray-700">Specialization</label>
                <input type="text" v-model="educationForm.specialization" :id="'specialization-' + index"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <div v-if="educationForm.errors.start_date"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ educationForm.errors.start_date }}
                </div>
                <label :for="'start_date-' + index"
                       class="block text-sm font-medium text-gray-700">Start date</label>
                <VueDatePicker
                    v-model="educationForm.start_date"
                    format="yyyy/MM/dd"
                    :id="'start_date-' + index"
                    :clearable="false"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                />
            </div>
            <div>
                <div v-if="educationForm.errors.end_date"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ educationForm.errors.end_date }}
                </div>
                <label :for="'end_date-' + index"
                       class="block text-sm font-medium text-gray-700">End date</label>
                <VueDatePicker
                    v-model="educationForm.end_date"
                    format="yyyy/MM/dd"
                    :clearable="false"
                    :id="'end_date-' + index"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                />
            </div>
            <div>
                <div v-if="educationForm.errors.status"
                     class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                    {{ educationForm.errors.status }}
                </div>
                <label :for="'status-' + index"
                       class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" v-model="educationForm.status" :id="'status-' + index"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="flex justify-start gap-2">
                <button @click.prevent="updateEducation"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
                <button @click.prevent="deleteEducation"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {useForm} from "@inertiajs/vue3";
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    name: 'EducationItem',
    components: {
        VueDatePicker
    },
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

        function updateEducation() {
            educationForm.post('/cv/' + props.cvId + '/education/update', {
                preserveScroll: true,
                onSuccess: (response) => educationForm.id = response.props.cv.education[props.index].id
            })
        }

        function deleteEducation() {
            const educationId = educationForm.id

            if (educationId) {
                educationForm.delete('/education/' + educationId + '/delete', {
                    preserveScroll: true,
                    onBefore: () => confirm('Are you sure you want to delete this education?'),
                })
            }

            emit('delete-education', props.index)
        }

        return {
            updateEducation,
            deleteEducation,
            educationForm
        };
    }
}
</script>
