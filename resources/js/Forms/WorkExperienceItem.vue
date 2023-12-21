<template>
    <div class="border-4 border-gray-200 rounded-lg p-4 mb-4">
        <form>
            <div class="flex flex-col gap-3">
                <div v-if="workExperienceForm.recentlySuccessful"
                     class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    Updated successfully.
                </div>
                <div>
                    <div v-if="workExperienceForm.errors.company_name"
                         class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ workExperienceForm.errors.company_name }}
                    </div>
                    <label :for="'company_name-' + index"
                           class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" v-model="workExperienceForm.company_name" :id="'company_name-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <div v-if="workExperienceForm.errors.position"
                         class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ workExperienceForm.errors.position }}
                    </div>
                    <label :for="'position-' + index"
                           class="block text-sm font-medium text-gray-700">Position name</label>
                    <input type="text" v-model="workExperienceForm.position" :id="'position-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <div v-if="workExperienceForm.errors.start_date"
                         class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ workExperienceForm.errors.start_date }}
                    </div>
                    <label :for="'start_date-' + index"
                           class="block text-sm font-medium text-gray-700">Start Date</label>
                    <VueDatePicker
                        v-model="workExperienceForm.start_date"
                        format="yyyy/MM/dd"
                        :clearable="false"
                        :id="'start_date-' + index"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    />
                </div>
                <div>
                    <div v-if="workExperienceForm.errors.end_date"
                         class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ workExperienceForm.errors.end_date }}
                    </div>
                    <label :for="'end_date-' + index"
                           class="block text-sm font-medium text-gray-700">End Date</label>
                    <VueDatePicker
                        v-model="workExperienceForm.end_date"
                        format="yyyy/MM/dd"
                        :id="'end_date-' + index"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    />
                </div>
                <div>
                    <div v-if="workExperienceForm.errors.description"
                         class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ workExperienceForm.errors.description }}
                    </div>
                    <label :for="'description-' + index"
                           class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea type="text" v-model="workExperienceForm.description" :id="'description-' + index"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>
                <div class="flex justify-start gap-2">
                    <button type="submit" @click.prevent="updateWorkExperience"
                            class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Update
                    </button>
                    <button @click.prevent="deleteWorkExperience"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import {useForm } from "@inertiajs/vue3";
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    name: 'WorkExperienceItem',
    components: {
        VueDatePicker,
    },
    props: {
        cvId: {
            type: Number,
            required: true
        },
        workExperience: Object,
        index: Number
    },
    setup(props, {emit}) {
        const workExperienceForm = useForm({
            id: props.workExperience?.id,
            company_name: props.workExperience?.company_name,
            position: props.workExperience?.position,
            start_date: props.workExperience?.start_date,
            end_date: props.workExperience?.end_date,
            description: props.workExperience?.description,
        });

        function updateWorkExperience() {
            workExperienceForm.post('/cv/' + props.cvId + '/work-experience/update', {
                preserveScroll: true,
                onSuccess: (response) => workExperienceForm.id = response.props.cv.work_experience[props.index].id
            })
        }

        function deleteWorkExperience() {
            const workExperienceId = workExperienceForm.id

            if (workExperienceId) {
                workExperienceForm.delete('/work-experience/' + workExperienceId + '/delete', {
                    preserveScroll: true,
                    onBefore: () => confirm('Are you sure you want to delete this work experience?'),
                })
            }

            emit('delete-work-experience', props.index)
        }

        return {
            updateWorkExperience,
            deleteWorkExperience,
            workExperienceForm,
            cvId: props.cvId
        };
    }
}
</script>
