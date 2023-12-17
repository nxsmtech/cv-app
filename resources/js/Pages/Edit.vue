<template>
    <AppLayout>
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-2xl font-bold text-gray-900">
                Edit CV
            </h1>

            <Main :cv="this.cv"/>
            <PersonalDetail :personal-detail="this.cv.personal_detail" :cv-id="this.cv.id"/>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import Main from "../Forms/Main.vue";
import PersonalDetail from "../Forms/PersonalDetail.vue";

export default {
    name: 'Edit',
    components: {
        PersonalDetail,
        Main,
        AppLayout
    },
    props: {
        cv: Object
    }
}
</script>

