<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/FronendLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ElMessage } from 'element-plus';

</script>

<template>

    <Head title="Registration" />
    <FrontendLayout>
        <section class="bg-blue-900 text-white py-10 px-4 banner">
        <div class="max-w-6xl mx-auto text-center md:text-left flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold">Requirement</h1>
                <p class="mt-4 text-white">With the skilled workforce at our organization not only we offer guidance on finance, bank proceedings, Visa guidance and sponsorship but also, we provide scholarship offers based on merit. Our organization will give a clear understanding of living expenses, airfare, tuition fees and other overhead costs.</p>

                </div>
            <div class="md:w-1/2 flex justify-center mt-6 md:mt-0">
                <img src="https://visathing.com/images/contact_us.svg" alt="Visa Consultation" class="max-w-full h-auto">
            </div>
        </div>
    </section>
    <div class="bg-blue-50 flex justify-center items-center min-h-screen">
    
    <div class="space-y-6 mt-10 mb-20">
        
        <h1 text-3xl font-bold>Educational Qualification</h1>
        <div class="flex items-center w-96">
            <span class="text-blue-900 font-bold flex-1 text-right">S.S.C/ O-Level</span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">01</div>
            <span class="flex-1"></span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="flex-1"></span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">02</div>
            <span class="text-blue-900 font-bold flex-1 text-left">H.S.C/ A-Level</span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="text-blue-900 font-bold flex-1 text-right">Bachelor's/Honours</span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">03</div>
            <span class="flex-1"></span>
        </div>

        <h1>Language(English) Proficiency</h1>
        <div class="flex items-center w-96">
            <span class="text-blue-900 font-bold flex-1 text-right">TOEFL 78</span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">01</div>
            <span class="flex-1"></span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="flex-1"></span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">02</div>
            <span class="text-blue-900 font-bold flex-1 text-left">IELTS 6</span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="text-blue-900 font-bold flex-1 text-right">iTEP 3.7</span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">03</div>
            <span class="flex-1"></span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="flex-1"></span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">04</div>
            <span class="text-blue-900 font-bold flex-1 text-left">PTE 50</span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="text-blue-900 font-bold flex-1 text-right">WAEC C6</span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">05</div>
            <span class="flex-1"></span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="flex-1"></span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">06</div>
            <span class="text-blue-900 font-bold flex-1 text-left">DET (Duolingo English Test) 110</span>
        </div>
        
        <div class="flex items-center w-96">
            <span class="text-blue-900 font-bold flex-1 text-right">TOEIC 800</span>
            <div class="flex items-center justify-center w-10 h-10 bg-white border-4 border-blue-900 text-blue-900 font-bold rounded-full mx-4">07</div>
            <span class="flex-1"></span>
        </div>
    </div>
    </div>
    </FrontendLayout>
</template>
<style scoped>
.banner {

    background-image: url(https://visathing.com/images/banner_bg_pattern.svg);
}
</style>
