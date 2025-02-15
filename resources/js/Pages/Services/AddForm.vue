<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from '@inertiajs/vue3';
import CKEditor from '@/Components/CkEditor.vue';
import { Head } from "@inertiajs/vue3";
import { ElMessage } from 'element-plus';

const form = useForm({
    title: '',
    content: '',
    featured_image: null,
});

const imagePreview = ref(null);

const handleFileChange = (event) => {
    const file = event.target.files[0];
    form.featured_image = file;
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const submit = () => {
    const formData = new FormData();
    formData.append('title', form.title);
    formData.append('content', form.content);
    if (form.featured_image) {
        formData.append('featured_image', form.featured_image);
    }

    form.post(route('service.store'), {
        forceFormData: true,
        onSuccess: () => {
            ElMessage({ type: 'success', message: 'Service created successfully!' });
        },
        onError: () => {
            ElMessage({ type: 'error', message: 'Failed to create service. Please try again.' });
        }
    });
};
</script>

<template>
    <Head title="Services"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Services</h2>
        </template>

        <div class="py-9">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="mb-4 text-lg font-semibold">Create a New Service</h1>
                        <form @submit.prevent="submit">
                          
                          <div class="mb-4 w-3/4 gap-6 pr-4">
                              <label class="block font-medium">Title</label>
                              <input v-model="form.title" type="text" class="border p-2 w-full" />
                          </div>
                            <div class="flex gap-6">
                                <!-- Left Side: CKEditor -->
                                <div class="w-3/4">
                                    <label class="block font-medium">Content</label>
                                    <CKEditor v-model="form.content" />
                                </div>

                                <!-- Right Side: File Upload -->
                                <div class="w-1/4">
                                    <label class="block font-medium">Featured Image</label>
                                    <input type="file" @change="handleFileChange" class="border p-2 w-full" />
                                    <div v-if="imagePreview" class="mt-2">
                                        <img :src="imagePreview" alt="Image Preview" class="w-full rounded" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="bg-blue-500 text-white p-2 mt-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
h2 {
    margin-bottom: 1rem;
}
</style>
