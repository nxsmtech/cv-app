<template>
    <AppLayout>
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-2xl font-bold text-gray-900">
                Edit CV
            </h1>

            <div class="flex">
                <div class="flex flex-col w-1/2">
                    <Main :cv="this.cv"/>
                    <Education :cv-id="this.cv.id" :education="this.cv.education"/>
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

export default {
    name: 'Edit',
    components: {
        WorkExperience,
        Education,
        PersonalDetail,
        Main,
        AppLayout
    },
    props: {
        cv: Object
    }
}
</script>

