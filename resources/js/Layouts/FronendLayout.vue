<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import Topbar from '@/Components/Topbar.vue';
</script>

<template>
    <div>
        <Topbar/>
        <Header/>
            
    
        <slot />
        <Footer/>
    </div>
</template>