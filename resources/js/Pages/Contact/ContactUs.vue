<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/FronendLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ElMessage } from 'element-plus';

const form = useForm({
    name: '',
    email: '',
    message: ''
});

const submitForm = () => {
    form.post(route("store.contact"), {
        preserveScroll: true,
        onSuccess: () => {
            ElMessage({ type: 'success', message: 'Your message has been sent successfully! We will be back you soon' });
            form.reset();
        },
        onError: (errors) => {
            ElMessage({ type: 'error', message: 'Failed to submit data. Please try again.' });
        },
    });
};
</script>

<template>

    <Head title="Registration" />
    <FrontendLayout>
        <body class="bg-gray-100">
    <section class="bg-blue-900 text-white py-10 px-4 banner">
        <div class="max-w-6xl mx-auto text-center md:text-left flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold">Get in Touch with Us!</h1>
                <p class="mt-4 text-white">Do you have questions or need assistance with your visa application? Reach out to Simsam Visa Consulting Agency. Our dedicated team is here to help you every step of the way. Contact us today for personalized support and expert guidance.</p>
            </div>
            <div class="md:w-1/2 flex justify-center mt-6 md:mt-0">
                <img src="https://visathing.com/images/contact_us.svg" alt="Visa Consultation" class="max-w-full h-auto">
            </div>
        </div>
    </section>
    
    <section class="py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Contact <span class="text-blue-600">Simsam Visa Consulting Agency, Bangladesh</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white shadow rounded-md">
                    <div class="flex">
                        <i class="fas fa-phone fa-2x text-blue-600 mt-3"></i>
                        <h3 class="text-xl font-semibold mt-4 ml-3">Call Us</h3>
                    </div>
                    <p class="text-gray-600 mt-5">Saturday - Thursday <br>(9:30 AM to 6:30 PM)</p>
                    <a href="tel:+8801719688704" class="text-blue-600 hover:underline mt-3">+880 1719-688704</a>
                </div>
                <div class="p-6 bg-white shadow rounded-md">
                    <div class="flex">
                        <i class="fas fa-envelope fa-2x text-blue-600 mt-3"></i>
                        <h3 class="text-xl font-semibold mt-4 ml-3">Chat to Support</h3>
                    </div>
                    <p class="text-gray-600 mt-5">We're here to help.</p>
                    <a href="mailto:info@visaconsultncy.com" class="text-blue-600 hover:underline mt-3">info@visaconsultncy.com</a>
                </div>
                <div class="p-6 bg-white shadow rounded-md">
                   <div class="flex">
                    <i class="fas fa-map-marker-alt fa-2x text-blue-600 mt-3"></i>
                    <h3 class="text-xl font-semibold mt-4 ml-4">Visit Us</h3>
                   </div>
                    <p class="text-gray-600 mt-5">Visit our office HQ.</p>
                    <p class="text-gray-600 mt-3">Dhaka, Bangladesh</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
            <div class="md:w-1/2 flex items-center justify-center p-6">
                <img src="https://www.searchenginejournal.com/wp-content/uploads/2023/02/contact-1x-63f497a00aa4a-sej.webp" alt="Contact Image" class="max-w-full h-auto">
            </div>
            <div class="md:w-1/2 p-6">
                <h2 class="text-2xl font-bold text-gray-700 mb-6">Get in Touch</h2>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-semibold mb-2" for="name">Full Name</label>
                        <input v-model="form.name" type="text" id="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-semibold mb-2" for="email">Email</label>
                        <input v-model="form.email" type="email" id="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-semibold mb-2" for="message">Message</label>
                        <textarea v-model="form.message" id="message" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</body>
    </FrontendLayout>
</template>
<style scoped>
.banner {

    background-image: url(https://visathing.com/images/banner_bg_pattern.svg);
}
</style>
