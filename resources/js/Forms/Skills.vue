<template>
    <div class="mt-4 border-4 border-gray-200 rounded-lg p-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-5">
            Skills
        </h2>
        <div>
            <h3>Technical</h3>
            <Multiselect
                mode="tags"
                v-model="technicalSkills"
                :close-on-select="true"
                :options="skillSet.Technical"
            />
        </div>
        <div>
            <h3>Soft</h3>
            <Multiselect
                mode="tags"
                v-model="softSkills"
                :close-on-select="true"
                :options="skillSet.Soft"
            />
        </div>
        <div>
            <h3>Leadership</h3>
            <Multiselect
                mode="tags"
                v-model="leadershipSkills"
                :close-on-select="true"
                :options="skillSet.Leadership"
            />
        </div>
        <div>
            <h3>Language</h3>
            <Multiselect
                mode="tags"
                v-model="languageSkills"
                :close-on-select="true"
                :options="skillSet.Language"
            />
        </div>
        <div class="mt-2">
            <button @click.prevent="updateSkills"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Update
            </button>
        </div>
    </div>
</template>

<script>
import Multiselect from '@vueform/multiselect';
import {router, usePage} from "@inertiajs/vue3";
import { computed, ref } from "vue";

export default {
    name: "Skills",
    components: {
        Multiselect,
    },
    props: {
        initialSkills: {
            type: Array,
        },
        cvId: Number,
    },
    setup(props) {
        const page = usePage();
        const skillSet = computed(() => page.props.constants.skills);

        const groupedByTypeSkills = props.initialSkills.reduce((acc, obj) => {
            if (!acc[obj.type]) {
                acc[obj.type] = [];
            }

            // Add the object to the type array
            acc[obj.type].push(obj.name);

            return acc;
        }, {});

        const technicalSkills = ref(groupedByTypeSkills.Technical)
        const softSkills = ref(groupedByTypeSkills.Soft)
        const leadershipSkills = ref(groupedByTypeSkills.Leadership)
        const languageSkills = ref(groupedByTypeSkills.Language)

        function updateSkills() {
            const skills = {
                Technical: technicalSkills.value,
                Soft: softSkills.value,
                Leadership: leadershipSkills.value,
                Language: languageSkills.value
            }
            router.post('/cv/' + props.cvId + '/skills/update', {skills});
        }

        return {
            updateSkills,
            technicalSkills,
            softSkills,
            leadershipSkills,
            languageSkills,
            skillSet
        }
    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
