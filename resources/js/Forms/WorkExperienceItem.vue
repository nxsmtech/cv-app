<template>
    <div class="border-4 border-gray-200 rounded-lg p-4 mb-4">
        <form @submit.prevent="workExperienceForm.post('/cv/' + cvId + '/work-experience/update')">
            <div class="flex flex-col gap-3">
                <div v-if="workExperienceForm.recentlySuccessful"
                     class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    Updated successfully.
                </div>
                <div>
                    <label :for="'company_name-' + index"
                           class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" v-model="workExperienceForm.company_name" :id="'company_name-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'position-' + index"
                           class="block text-sm font-medium text-gray-700">Position name</label>
                    <input type="text" v-model="workExperienceForm.position" :id="'position-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'start_date-' + index"
                           class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="text" v-model="workExperienceForm.start_date" :id="'start_date-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'end_date-' + index"
                           class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="text" v-model="workExperienceForm.end_date" :id="'end_date-' + index"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label :for="'description-' + index"
                           class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea type="text" v-model="workExperienceForm.description" :id="'description-' + index"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import {router, useForm} from "@inertiajs/vue3";
import {reactive} from 'vue'

export default {
    name: 'WorkExperienceItem',
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

        function deleteWorkExperience() {
            const workExperienceId = props.workExperience.id

            if (workExperienceId) {
                // router.delete('/education/' + workExperienceId + '/delete')
            }

            emit('delete-work-experience', props.index)
        }

        return {
            deleteWorkExperience,
            workExperienceForm,
            cvId: props.cvId
        };
    }
}
</script>
