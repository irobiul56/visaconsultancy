<script setup>
import { defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';
import FrontendLayout from '@/Layouts/FronendLayout.vue';

const props = defineProps({
    studyabroad: Object
});
</script>

<template>
    <Head :title="studyabroad.title" />
    <FrontendLayout>
        <div class="studyabroad-container">
            <h1 class="title">{{ studyabroad.title }}</h1>
            <img :src="`/storage/${studyabroad.image}`" alt="Study Abroad Image" class="w-full object-cover rounded">
            <p class="description text-justify" v-html="studyabroad.description"></p>
            <el-button type="primary" @click="$inertia.get('/study-abroad-all')">Back</el-button>
        </div>
    </FrontendLayout>
</template>

<style scoped>
.studyabroad-container {
    padding: 20px;
    text-align: center;
}
.title {
    font-size: 24px;
    margin-bottom: 20px;
}
.description {
    color: #555;
    font-size: 16px;
    line-height: 1.8;
    margin-top: 10px;
}
</style>
