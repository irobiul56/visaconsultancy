<script setup>
import { defineProps, computed } from 'vue';
import FrontendLayout from '@/Layouts/FronendLayout.vue';
import { Head } from '@inertiajs/vue3';

// Props from Laravel
const props = defineProps({
    services: Array
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
    <Head title="Welcome" />
    <FrontendLayout>
        <div class="service-container">
            <div class="serviceshead"><h1>Services</h1></div>
            <el-row :gutter="20">
                <el-col v-for="service in services" :key="service.id" :span="6">
                    <el-card shadow="hover" class="text-justify">
                        <template #header>
                            <div class="card-header">
                                <span>{{ service.title }}</span>
                            </div>
                        </template>
                        <img :src="`/storage/${service.image}`" alt="Service Image" class=" w-100% object-cover rounded m-2">
                        <p class="description">{{ getShortDescription(service.description, 100) }}</p>
                        <el-button type="primary">Learn More</el-button>
                    </el-card>
                </el-col>
            </el-row>
        </div>
    </FrontendLayout>
</template>

<style scoped>
.service-container {
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
.serviceshead{
  text-align: center;
  padding: 0.5rem;
  background-color: #f1f5f9;
  color: #191b20;
  font-size: 2rem;
  margin-bottom: 20px;
}
</style>
