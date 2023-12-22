<template>
    <AppLayout>
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-2xl font-bold text-gray-900">
                Edit CV
            </h1>

            <Link href="/">
                <div class="my-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Return to list
                    </button>
                </div>
            </Link>

            <div class="flex">
                <div class="flex flex-col w-1/2">
                    <Main :cv="this.cv"/>
                    <Education :cv-id="this.cv.id" :education="this.cv.education"/>
                    <Skills :cv-id="this.cv.id" :initial-skills="this.cv.skill"/>
                </div>
                <div class="flex flex-col w-1/2">
                    <PersonalDetail :personal-detail="this.cv.personal_detail" :cv-id="this.cv.id"/>
                    <WorkExperience :cv-id="this.cv.id" :experience="this.cv.work_experience"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import Main from "../Forms/Main.vue";
import PersonalDetail from "../Forms/PersonalDetail.vue";
import Education from "../Forms/Education.vue";
import WorkExperience from "../Forms/WorkExperience.vue";
import Skills from "../Forms/Skills.vue";
import {Link} from '@inertiajs/vue3'

export default {
    name: 'Edit',
    components: {
        Skills,
        WorkExperience,
        Education,
        PersonalDetail,
        Main,
        AppLayout,
        Link,
    },
    props: {
        cv: Object
    }
}
</script>

