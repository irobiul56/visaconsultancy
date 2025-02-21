<script setup>
import { defineProps, computed } from 'vue';
import FrontendLayout from '@/Layouts/FronendLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const viewDetails = (id) => {
    router.get(`/studyabroad/${id}`);
};


// Props from Laravel
const props = defineProps({
    studyabroad: Array
});

// Function to strip HTML and limit characters
const getShortDescription = (htmlContent, maxLength = 150) => {
    if (!htmlContent) return '';
    
    // Create a temporary DOM element to strip HTML
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = htmlContent;
    const text = tempDiv.textContent || tempDiv.innerText || '';

    // Return truncated text with "..." if longer than maxLength
    return text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
};
</script>

<template>
    <Head title="Study Abroad" />
    <FrontendLayout>
        <div class="studyabroad-container">
            <div class="studyabroadshead"><h1>Study Abroad</h1></div>
            <el-row :gutter="20">
                <el-col v-for="studyabroads in studyabroad" :key="studyabroad.id" :span="6">
                    <el-card shadow="hover" class="text-justify">
                        <template #header>
                            <div class="card-header">
                                <span>{{ studyabroads.title }}</span>
                            </div>
                        </template>
                        <img :src="`/storage/${studyabroads.image}`" alt="studyabroad Image" class=" w-100% object-cover rounded m-2">
                        <p class="description">{{ getShortDescription(studyabroads.description, 100) }}</p>
                        <el-button type="primary" @click="viewDetails(studyabroads.id)">Learn More</el-button>
                    </el-card>
                </el-col>
            </el-row>
        </div>
    </FrontendLayout>
</template>

<style scoped>
.studyabroad-container {
    padding: 20px;
}
.el-card {
    margin-bottom: 20px;
}
.description {
    color: #555;
    font-size: 14px;
    line-height: 1.6;
}
.el-button{
    width: 100%;
    margin-top: 10px ;
}
.studyabroadshead{
  text-align: center;
  padding: 0.5rem;
  background-color: #f1f5f9;
  color: #191b20;
  font-size: 2rem;
  margin-bottom: 20px;
}
</style>
