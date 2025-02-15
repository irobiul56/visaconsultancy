<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { ref, computed } from 'vue'
import { usePage, useForm } from '@inertiajs/vue3';
import { ElMessage } from "element-plus";

const { props } = usePage()
const services = ref(props.services)

const itemsPerPage = ref(10)
const currentPage = ref(1)
const searchQuery = ref('')

const filteredservices = computed(() => {
  const filtered = services.value.filter(services => 
  services.title.toLowerCase().includes(searchQuery.value.toLowerCase()) 
  )
  const start = (currentPage.value - 1) * itemsPerPage.value
  const end = start + itemsPerPage.value
  return filtered.slice(start, end)
})

const totalPages = computed(() => {
  return Math.ceil(
    services.value.filter(services => 
    services.title.toLowerCase().includes(searchQuery.value.toLowerCase()) 
    ).length / itemsPerPage.value
  )
})

const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    currentPage.value++
  }
}

const prevPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--
  }
}


defineProps({ 
    errors: Object 
})

const deleteservices = (servicesId) => {
    if (confirm("Are you sure you want to delete this data?")) {
        services.delete(route('services.destroy', servicesId), {
            onSuccess: (page) => {
                services.value = page.props.services; // Update the servicess list after deletion
                ElMessage.success("services deleted successfully!");
            },
            onError: () => {
                ElMessage.error("Failed to delete the services. Please try again.");
            },
        });
    }
};


</script>

<template>
    <AuthenticatedLayout>

        <div v-if="$page.props.flash?.message" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 alert">
        {{ $page.props.flash?.message }}
      </div>
      
        <Head title="services page"></Head>
        <div class="container mx-auto mt-10">
            <div class="relative mx-4 lg:mx-0 mb-2">
                <input v-model="searchQuery"
                    class="w-32 pl-10 pr-4 text-indigo-600 border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                    type="text" placeholder="Search">
                    <el-button class=" ml-3"  type="success"><Link :href="route('services.add')" class="button">Add</Link></el-button>

            </div>

            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="text-left">
                        <th class="py-2 px-4 border-b-2">#</th>
                        <th class="py-2 px-4 border-b-2">Image</th>
                        <th class="py-2 px-4 border-b-2">Title</th>
                        <th class="py-2 px-4 border-b-2">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(services, index) in filteredservices" :key="index" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ index + 1 }}</td>
                        <td class="py-2 px-4 border-b">
                            <img :src="`/storage/${services.image}`" alt="Service Image" class="h-10 w-10 object-cover rounded border m-2">
                        </td>
                        <td class="py-2 px-4 border-b">{{ services.title }}</td>
                        <td class="gap-5 py-2 px-4 border-b">

                           <!-- Edit button to open modal for editing -->
                            <link @click="editservices(services)">
                                <el-button>Edit</el-button>
                            </link>

                            <Link @click="deleteservices(services.id)">
                                <el-button>Delete</el-button>
                            </Link>
                        </td>
                    </tr>
                </tbody>

            </table>
            <tfoot class="flex items-center mt-4">

                <button class="py-2 px-4 bg-gray-300 hover:bg-gray-400 rounded" :disabled="currentPage === 1"
                    @click="prevPage">
                    Previous
                </button>
                <span class="ml-2">Page {{ currentPage }} of {{ totalPages }}</span>
                <button class="py-2 px-4 bg-gray-300 hover:bg-gray-400 rounded ml-2"
                    :disabled="currentPage === totalPages" @click="nextPage">
                    Next
                </button>

            </tfoot>
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>
/* Modal Styles */
.custom-modal .el-dialog__title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 1rem;
}

.modal-content {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.mx-auto{
    margin-top: 10px;;
}
</style>
