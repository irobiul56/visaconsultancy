<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { ref, computed } from 'vue'
import { usePage, useForm } from '@inertiajs/vue3';
import { ElMessage } from "element-plus";

const { props } = usePage()
const contactlist = ref(props.contactlist)

const itemsPerPage = ref(10)
const currentPage = ref(1)
const searchQuery = ref('')

const filteredcontactlist = computed(() => {
  const filtered = contactlist.value.filter(contactlist => 
  contactlist.name.toLowerCase().includes(searchQuery.value.toLowerCase()) 
  )
  const start = (currentPage.value - 1) * itemsPerPage.value
  const end = start + itemsPerPage.value
  return filtered.slice(start, end)
})

const totalPages = computed(() => {
  return Math.ceil(
    contactlist.value.filter(contactlist => 
    contactlist.name.toLowerCase().includes(searchQuery.value.toLowerCase()) 
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

const deletecontactlist = (contactlistId) => {
    if (confirm("Are you sure you want to delete this data?")) {
        contactlist.delete(route('contactlist.destroy', contactlistId), {
            onSuccess: (page) => {
                contactlist.value = page.props.contactlist; // Update the contactlists list after deletion
                ElMessage.success("contactlist deleted successfully!");
            },
            onError: () => {
                ElMessage.error("Failed to delete the contactlist. Please try again.");
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
      
        <Head title="contactlist page"></Head>
        <div class="container mx-auto mt-10">
            <div class="relative mx-4 lg:mx-0 mb-2">
                <input v-model="searchQuery"
                    class="w-32 pl-10 pr-4 text-indigo-600 border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                    type="text" placeholder="Search">
            </div>
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="text-left">
                        <th class="py-2 px-4 border-b-2">#</th>
                        <th class="py-2 px-4 border-b-2">Name</th>
                        <th class="py-2 px-4 border-b-2">Email</th>
                        <th class="py-2 px-4 border-b-2">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(contactlist, index) in filteredcontactlist" :key="index" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ contactlist.name }}</td>
                        <td class="py-2 px-4 border-b">{{ contactlist.email }}</td>
                        <td class="py-2 px-4 border-b">{{ contactlist.message }}</td>
                        
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
