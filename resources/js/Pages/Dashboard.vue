<script setup>
import { ref, defineProps, reactive, watch, onMounted } from "vue";
import { router } from "@inertiajs/vue3";
import { ElMessage, ElMessageBox } from "element-plus";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

// Handle menu toggle inside Vue lifecycle
onMounted(() => {
    const menuIcon = document.querySelector(".menu-icon");
    const navbar = document.querySelector(".navbar");

    if (menuIcon && navbar) {
        menuIcon.addEventListener("click", () => {
            navbar.classList.toggle("active");
        });
    }
});

// Define props
const props = defineProps({
    appointments: Array
});

// Search state
const search = reactive({
    selected_date: "",
    selected_time: "",
    phone: ""
});

// Available time slots
const availableTimeSlots = [
    "11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", 
    "3:00 PM", "4:00 PM", "5:00 PM", "6:00 PM", "7:00 PM"
];

// Fetch filtered appointments
const fetchAppointments = () => {
    router.get(route("dashboard"), search, {
        preserveState: true,
        replace: true
    });
};

// Watch for instant search (phone number)
watch(() => search.phone, fetchAppointments);

// Reset search filters
const resetFilters = () => {
    search.selected_date = "";
    search.selected_time = "";
    search.phone = "";
    fetchAppointments();
};

// Delete Appointment
const deleteAppointment = (id) => {
    ElMessageBox.confirm("Are you sure you want to delete this appointment?", "Warning", {
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        type: "warning"
    }).then(() => {
        router.delete(route("appointments.destroy", id), {
            onSuccess: () => ElMessage.success("Appointment deleted successfully!"),
            onError: () => ElMessage.error("Failed to delete the appointment.")
        });
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div>
                            <h2>Appointment List</h2>


                            <!-- Search Filters -->
                            <div class="search-filters">
                            <!-- Instant Search Bar -->
                            <el-input class="custom-input"
                                v-model="search.phone" 
                                size="small"
                                placeholder="Search by phone number..." 
                                clearable 
                                @input="fetchAppointments"
                            />
                                <el-date-picker class="custom-date-picker"
                                    v-model="search.selected_date"
                                    type="date"
                                    placeholder="Select Date"
                                    format="YYYY-MM-DD"
                                    value-format="YYYY-MM-DD"
                                />
                                <el-select v-model="search.selected_time" class="custom-input" placeholder="Select Time" clearable>
                                    <el-option v-for="time in availableTimeSlots" :key="time" :label="time" :value="time" />
                                </el-select>
                                <el-button type="primary" @click="fetchAppointments">Search</el-button>
                                <el-button @click="resetFilters">Reset</el-button>
                            </div>

                            <!-- Appointment Table -->
                            <el-table :data="appointments" style="width: 100%">
                                <el-table-column prop="name" label="Name" />
                                <el-table-column prop="email" label="Email" />
                                <el-table-column prop="phone" label="Phone" />
                                <el-table-column prop="selected_date" label="Date" />
                                <el-table-column prop="selected_time" label="Time" />
                                <el-table-column label="Actions">
                                    <template #default="{ row }">
                                        <el-button type="danger" @click="deleteAppointment(row.id)">Delete</el-button>
                                    </template>
                                </el-table-column>
                            </el-table>

                            <el-empty v-if="appointments.length === 0" description="No Appointments Found" />
                        </div>
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

.search-filters {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.custom-input{
    width: 35%;  /* Adjust width */
    font-size: 16px; /* Adjust text size */
}
.custom-date-picker{
    width: 50%;  /* Adjust width */
    font-size: 16px; /* Adjust text size */
}
</style>
