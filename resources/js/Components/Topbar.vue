<template>
    <div class="top-header">
        <el-header class="topbar">
            <div class="contact-info">
                <span> <el-icon><Message /></el-icon> info@visaconsultncy.com</span>
                <span> <el-icon><Phone /></el-icon> +1-347-233-5473</span>
                <span> <el-icon><Phone /></el-icon> +880 1719-688704</span>
                <span><el-icon><LocationInformation /></el-icon> Dhaka, Bangladesh</span>
            </div>
            <div class="contact-info">
                <el-link :underline="false" href="https://facebook.com" target="_blank">
                    <span>Facebook</span>
                </el-link>
                <el-link :underline="false" href="https://twitter.com" target="_blank">
                    <span>X</span>
                </el-link>
                <el-link :underline="false" href="https://instagram.com" target="_blank">
                    <span>Instagram</span>
                </el-link>
                <el-link :underline="false" href="https://linkedin.com" target="_blank">
                    <span>Linkedin</span>
                </el-link>
            </div>
        </el-header>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import {LocationInformation, Phone, Message } from '@element-plus/icons-vue';

const activeIndex = ref('1');

const handleSelect = (index) => {
    console.log('Selected index:', index);
    // You can add navigation logic here
};
</script>

<style scoped>
.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 10px;
    color: white;
    margin: 0 30px 0 30px;
    background-color: #04192e;
}

.top-header{
    background-color: #04192e;
}

.el-header{
    --el-header-height: 34px;
}

.contact-info {
    display: flex;
    gap: 20px;
    font-size: 0.9em;
    margin: 30px 0 30px 0;
}

.el-link {
    color: white;
}

.el-link:hover {
    color: #409EFF; /* Change color on hover if needed */
}
</style>