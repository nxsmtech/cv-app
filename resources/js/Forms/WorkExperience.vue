<template>
    <div class="mt-4 border-4 border-gray-200 rounded-lg p-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-5">
            Work Experience
        </h2>
        <div v-for="(workExperience, index) in workExperience" :key="workExperience.id || index">
            <WorkExperienceItem :cv-id="cvId" :work-experience="workExperience" :index="index" @delete-work-experience="handleDeleteWorkExperience" />
        </div>

        <button @click="addWorkExperience" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Add New Work Experience
        </button>
    </div>
</template>

<script>
import WorkExperienceItem from "./WorkExperienceItem.vue";

export default {
    name: "WorkExperience",
    components: {WorkExperienceItem},
    props: {
        experience: {
            type: Array,
            required: true,
        },
        cvId: {
            type: Number,
            required: true
        }
    },
    setup(props) {
        const workExperience = props.experience

        const addWorkExperience = () => {
            workExperience.push({});
        };

        const handleDeleteWorkExperience = (index) => {
            workExperience.splice(index, 1)
        };

        return {
            workExperience,
            addWorkExperience,
            handleDeleteWorkExperience,
        };
    }
}
</script>

<style scoped>

</style>
