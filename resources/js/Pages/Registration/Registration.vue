<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/FronendLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ElMessage } from 'element-plus';

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    phone_number: "",
    qualification: "",
    division: "",
    district: "",
    address: "",
});

const submitForm = () => {
    form.post(route("registrations.store"), {
        preserveScroll: true,
        onSuccess: () => {
            ElMessage({ type: 'success', message: 'Registration successful! We will be back you soon' });
            form.reset();
        },
        onError: (errors) => {
            ElMessage({ type: 'error', message: 'Failed to create service. Please try again.' });
        },
    });
};
</script>

<template>
    <Head title="Registration" />
    <FrontendLayout>
        <div
            class="bg-cover bg-center p-10 flex items-center justify-center"
            style="
                background-image: url('https://parade.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cg_xy_center%2Cq_auto:good%2Cw_1200%2Cx_1027%2Cy_378/MTkwNTgxMzg5OTM4NDY3OTY1/graduation-homemade-hits-ftr.jpg');
            "
        >
            <div class="bg-white p-10 rounded-lg shadow-lg max-w-2xl w-full">
                <h2 class="text-center text-2xl font-bold mb-6">
                    Registration Form
                </h2>
                <form @submit.prevent="submitForm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium"
                                >First Name *</label
                            >
                            <input
                                v-model="form.first_name"
                                type="text"
                                placeholder="Enter first name"
                                class="w-full p-2 border rounded-lg mt-1"
                            />
                            <p v-if="form.errors.first_name" class="text-red-500 text-sm">
                                {{ form.errors.first_name }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium"
                                >Last Name *</label
                            >
                            <input
                                v-model="form.last_name"
                                type="text"
                                placeholder="Enter last name"
                                class="w-full p-2 border rounded-lg mt-1"
                            />
                            <p v-if="form.errors.last_name" class="text-red-500 text-sm">
                                {{ form.errors.last_name }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Email *</label>
                            <input
                                v-model="form.email"
                                type="email"
                                placeholder="Enter email"
                                class="w-full p-2 border rounded-lg mt-1"
                            />
                            <p v-if="form.errors.email" class="text-red-500 text-sm">
                                {{ form.errors.email }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium"
                                >Phone Number *</label
                            >
                            <input
                                v-model="form.phone_number"
                                type="text"
                                placeholder="Enter phone"
                                class="w-full p-2 border rounded-lg mt-1"
                            />
                            <p v-if="form.errors.phone_number" class="text-red-500 text-sm">
                                {{ form.errors.phone_number }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium"
                            >Educational Qualification *</label
                        >
                        <div class="mt-2 space-x-4">
                            <label
                                ><input v-model="form.qualification" type="radio" value="SSC/HSC" />
                                SSC/HSC</label
                            >
                            <label
                                ><input v-model="form.qualification" type="radio" value="Diploma" />
                                Diploma</label
                            >
                            <label
                                ><input v-model="form.qualification" type="radio" value="Bachelor" />
                                Bachelor</label
                            >
                            <label
                                ><input v-model="form.qualification" type="radio" value="Master" />
                                Master's</label
                            >
                            <label
                                ><input v-model="form.qualification" type="radio" value="PhD" />
                                PhD</label
                            >
                        </div>
                        <p v-if="form.errors.qualification" class="text-red-500 text-sm">
                            {{ form.errors.qualification }}
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-medium">Division *</label>
                            <input
                                v-model="form.division"
                                type="text"
                                placeholder="Enter Division"
                                class="w-full p-2 border rounded-lg mt-1"
                            />
                            <p v-if="form.errors.division" class="text-red-500 text-sm">
                                {{ form.errors.division }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">District *</label>
                            <input
                                v-model="form.district"
                                type="text"
                                placeholder="Enter District"
                                class="w-full p-2 border rounded-lg mt-1"
                            />
                            <p v-if="form.errors.district" class="text-red-500 text-sm">
                                {{ form.errors.district }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium">Address *</label>
                        <input
                            v-model="form.address"
                            type="text"
                            placeholder="Enter here..."
                            class="w-full p-2 border rounded-lg mt-1"
                        />
                        <p v-if="form.errors.address" class="text-red-500 text-sm">
                            {{ form.errors.address }}
                        </p>
                    </div>
                    <div class="mt-6 text-center">
                        <button
                            type="submit"
                            class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800"
                            :disabled="form.processing"
                        >
                            Submit →
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </FrontendLayout>
</template>
