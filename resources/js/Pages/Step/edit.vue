<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from '@inertiajs/vue3';
import CKEditor from '@/Components/CkEditor.vue';
import { Head } from "@inertiajs/vue3";
import { ElMessage } from 'element-plus';

const props = defineProps({
    step: Object,
    errors: Object
});

// Form Setup
const form = useForm({
    title: props.step.title,
    content: props.step.description,
    featured_image: null,
});

const imagePreview = ref(props.step.image ? `/storage/${props.step.image}` : null);

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

// Submit the form
const updateStep = () => {
    form.transform((data) => ({
        ...data,
        _method: "PUT", // Forces Laravel to recognize it as a PUT request
    })).post(route("step.update", props.step.id), {
        forceFormData: true, // Ensures FormData is used correctly
        onSuccess: () => {
            ElMessage.success("Step updated successfully!");
        },
        onError: () => {
            ElMessage.error("Failed to update step. Please try again.");
        }
    });
};

</script>

<template>
    <Head title="Edit Step"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit Step</h2>
        </template>

        <div class="py-9">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="mb-4 text-lg font-semibold">Edit Step</h1>
                        <form @submit.prevent="updateStep">
                          <div class="mb-4 w-3/4 gap-6 pr-4">
                              <label class="block font-medium">Title</label>
                              <input v-model="form.title" type="text" class="border p-2 w-full" />
                              <span class="text-red-500 text-sm" v-if="errors.title">{{ errors.title }}</span>
                          </div>

                            <div class="flex gap-6">
                                <!-- Left Side: CKEditor -->
                                <div class="w-3/4">
                                    <label class="block font-medium">Content</label>
                                    <CKEditor v-model="form.content" />
                                    <span class="text-red-500 text-sm" v-if="errors.content">{{ errors.content }}</span>
                                </div>

                                <!-- Right Side: File Upload -->
                                <div class="w-1/4">
                                    <label class="block font-medium">Featured Image</label>
                                    <input type="file" @change="handleFileChange" class="border p-2 w-full" />
                                    <input type="hidden" name="_method" value="PUT">
                                    <div v-if="imagePreview" class="mt-2">
                                        <img :src="imagePreview" alt="Image Preview" class="w-full rounded" />
                                    </div>
                                    <span class="text-red-500 text-sm" v-if="errors.featured_image">{{ errors.featured_image }}</span>
                                </div>
                            </div>

                            <div class="flex space-x-2 mt-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Update
                                </button>
                                <Link :href="route('step.index')" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                    Cancel
                                </Link>
                            </div>
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
