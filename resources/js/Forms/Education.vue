<template>
    <div class="mt-4 border-4 border-gray-200 rounded-lg p-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-5">
            Education
        </h2>
        <div v-for="(education, index) in education" :key="education.id || index">
            <EducationItem :cv-id="cvId" :education="education" :index="index" @delete-education="handleDeleteEducation" />
        </div>

        <button @click="addEducation" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Add New Education
        </button>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import EducationItem from './EducationItem.vue';

export default {
    name: 'Education',
    components: {
        AppLayout,
        EducationItem
    },
    props: {
        education: {
            type: Array,
            required: true,
        },
        cvId: {
            type: Number,
            required: true
        }
    },
    setup(props) {
        const education = props.education

        const addEducation = () => {
            education.push({});
        };

        const handleDeleteEducation = (index) => {
            education.splice(index, 1)
        };

        return {
            education,
            addEducation,
            handleDeleteEducation,
        };
    }
}
</script>
