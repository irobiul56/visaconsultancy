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
        <section class="banner">
            <div class="content">
                <div class="text-section">
                    <h1 class="text-white">About Sim Sam Visa Consulting Agency!</h1>
                    <p class="text-white text-lg">
                        <h3>Why Do You Trust the Simsam Visa Consulting Agency??</h3>
                        Many Bangladeshi students having a dream to study abroad but navigating the journey to study
                        abroad often face a confusing challenge. The Simsam Visa Consulting Agency is an authorized and
                        leading higher education visa consultancy platform, located in Dhaka, Bangladesh. We are working
                        closely to bring the dream to reality and helping students to make the decision easier.
                    </p>
                </div>
                <div class="image-section">
                    <img :src="'/storage/image/about banner.png'" alt="About VISAThing">
                </div>
            </div>
        </section>

        <!-- New Section: "What is VISATThing!" -->
        <section class="bg-white py-16 px-6">
                <div class="mt-8 lg:mt-0 lg:pl-12">
            
                <p class="text-gray-600 text-lg">
                <p>We provide guidance and assistance to prospective students who are planning to go to the United States of
                America for their higher education. </p>
                <p>We are envisioned to extend our services to the students' higher studies in The United Kingdom, Canada,
                Australia, New Zealand, UAE, and the European countries.</p>

            <p>Simsam Visa Consulting Agency aids students with superior & customized services according to the need of
                them like the IELTS, Duolingo & Business Communication English. We are a team of counselors, mentors &
                teachers who are consistently ensuring every student gets qualitative training and guidance throughout
                the processing of their application for higher studies.</p>

             <p>Being a transparent service provider while preparing the admission file & visa processing, we always
                make sure that the documents of our students are up to date and the prerequisites of the university &
                embassy are fulfilled.</p>

            <p>With the skilled workforce at our organization not only we offer guidance on finance, bank proceedings,
                Visa guidance and sponsorship but also, we provide scholarship offers based on merit. Our organization
                will give a clear understanding of living expenses, airfare, tuition fees and other overhead costs.</p>

            <p> Here at Simsam Visa Consulting Agency, your will is our drill. We serve students & individuals
                irrespective of differences in every possible way.</p>
                    </p>
                </div>
        </section>
    </FrontendLayout>
</template>
<style scoped>
.banner {
    background: #0d47a1;
    background-image: url(https://visathing.com/images/banner_bg_pattern.svg);
    color: white;
    padding: 20px;
    text-align: left;
}

.breadcrumb {
    font-size: 14px;
    margin-bottom: 10px;
}

.breadcrumb a {
    color: white;
    text-decoration: none;
    margin: 0 5px;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

.text-section {
    width: 50%;
}

.text-section h1 {
    font-size: 25px;
    margin-bottom: 10px;
}

.text-section p {
    font-size: 16px;
    line-height: 1.5;
}

.image-section {
    width: 45%;
}

.image-section img {
    max-width: 100%;
    border-radius: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    .content {
        flex-direction: column;
        text-align: center;
    }

    .text-section,
    .image-section {
        width: 100%;
    }
}
</style>
