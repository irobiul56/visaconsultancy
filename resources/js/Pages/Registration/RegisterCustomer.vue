<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { ElMessage } from "element-plus";

const { props } = usePage();
const customer = ref(props.customer);

const itemsPerPage = ref(10);
const currentPage = ref(1);
const searchQuery = ref("");

const formatDate = (dateString) => {
  return new Intl.DateTimeFormat("en-US", {
    year: "numeric",
    month: "short",
    day: "2-digit",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
    hour12: true,
  }).format(new Date(dateString));
};

const filteredcustomer = computed(() => {
  const filtered = customer.value.filter((customer) =>
    customer.first_name.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
  const start = (currentPage.value - 1) * itemsPerPage.value;
  const end = start + itemsPerPage.value;

  return filtered.slice(start, end).map((customer) => ({
    ...customer,
    formattedDate: formatDate(customer.created_at),
  }));
});

const totalPages = computed(() => {
  return Math.ceil(
    customer.value.filter((customer) =>
      customer.first_name.toLowerCase().includes(searchQuery.value.toLowerCase())
    ).length / itemsPerPage.value
  );
});

const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    currentPage.value++;
  }
};

const prevPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--;
  }
};
</script>


<template>
    <AuthenticatedLayout>

        <div v-if="$page.props.flash?.message" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 alert">
        {{ $page.props.flash?.message }}
      </div>
      
        <Head title="Register Customer"></Head>
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
                        <th class="py-2 px-4 border-b-2">Phone</th>
                        <th class="py-2 px-4 border-b-2">Qualificatioon</th>
                        <th class="py-2 px-4 border-b-2">District</th>
                        <th class="py-2 px-4 border-b-2">Rgistration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(customer, index) in filteredcustomer" :key="index" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ customer.first_name }} {{ customer.last_name }}</td>
                        <td class="py-2 px-4 border-b">{{ customer.email }}</td>
                        <td class="py-2 px-4 border-b">{{ customer.phone_number }}</td>
                        <td class="py-2 px-4 border-b">{{ customer.qualification }}</td>
                        <td class="py-2 px-4 border-b">{{ customer.district }}</td>
                        <td class="py-2 px-4 border-b">{{ customer.formattedDate }}</td>

                        
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
