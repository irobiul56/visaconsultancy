<template>
    <div>
      <!-- Book Appointment Button -->
      <el-button type="primary" @click="openDialog">Book Appointment</el-button>
  
      <!-- Appointment Booking Dialog -->
      <el-dialog v-model="dialogVisible" title="Book an Appointment" width="50%">
        <div v-if="step === 1" class="appointment-container">
          <!-- Calendar Section -->
          <div class="calendar-section">
            <el-calendar 
            v-model="selectedDate" 
            :disabled-date="disablePastDates" 
            @change="handleDateSelect"
            class="small-calendar"
            />
          </div>
  
          <!-- Time Slot Section -->
          <div class="time-slot-section">
            <h3>Select a time</h3>
            <div class="time-slots">
              <el-button 
                v-for="(time, index) in availableTimeSlots" 
                :key="index" 
                size="small" 
                :type="selectedTime === time ? 'primary' : 'default'" 
                @click="selectTimeSlot(time)"
              >
                {{ time }}
              </el-button>
            </div>
          </div>
        </div>
  
        <div v-if="step === 2" class="form-container">
          <!-- Appointment Details Form -->
          <el-form :model="form">
            <el-form-item label="Name">
              <el-input v-model="form.name" />
            </el-form-item>
  
            <el-form-item label="Email">
              <el-input v-model="form.email" />
            </el-form-item>
  
            <el-form-item label="Phone">
              <el-input v-model="form.phone" />
            </el-form-item>
  
            <el-form-item label="Address">
              <el-input v-model="form.address" />
            </el-form-item>
          </el-form>
        </div>
  
        <!-- Dialog Footer -->
        <template #footer>
          <el-button @click="dialogVisible = false">Cancel</el-button>
          <el-button type="primary" @click="handleContinue">Continue</el-button>
        </template>
      </el-dialog>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import { useForm } from "@inertiajs/vue3";
  
  // Dialog and form data
  const dialogVisible = ref(false);
  const step = ref(1); // Step 1: Date and time, Step 2: Form
  const selectedDate = ref(new Date());
  const selectedTime = ref(null);
  
  // Example: Time slots for selection
  const availableTimeSlots = [
    "11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", 
    "3:00 PM", "4:00 PM", "5:00 PM", "6:00 PM", "7:00 PM"
  ];
  
  // Form data using Inertia.js form helper
  const form = useForm({
    name: '',
    email: '',
    phone: '',
    address: '',
    selected_date: '',
    selected_time: ''
  });
  
  // Open Dialog
  const openDialog = () => {
    dialogVisible.value = true;
  };
  
  // Disable past dates in the calendar
  const disablePastDates = (date) => {
    return date.getTime() < new Date().setHours(0, 0, 0, 0);
  };
  
  // Handle date selection
  const handleDateSelect = (date) => {
    selectedDate.value = date;
    form.selected_date = date.toISOString().split('T')[0]; // Format as YYYY-MM-DD
  };
  
  // Handle time slot selection
  const selectTimeSlot = (time) => {
    selectedTime.value = time;
    form.selected_time = time;
  };
  
  // Handle Continue button
  const handleContinue = () => {
    // Ensure both date and time are selected before proceeding
    if (step.value === 1) {
      if (!form.selected_date || !form.selected_time) {
        alert("Please select a date and time slot.");
        return;
      }
      step.value = 2; // Move to the next step
    } else if (step.value === 2) {
      if (!form.name || !form.email || !form.phone || !form.address) {
        alert("Please fill all the fields.");
        return;
      }
  
      form.post(route('appointment.store'), {
        onSuccess: () => {
          alert("Appointment booked successfully!");
          dialogVisible.value = false;
        },
        onError: (errors) => {
          console.error("Error:", errors);
          alert("There was an error booking the appointment.");
        }
      });
    }
  };
  </script>
  
  <style scoped>
  .appointment-container {
    display: flex;
    gap: 2rem;
    padding: 1rem;
  }
  
  .calendar-section {
    flex: 4;
  }
  
  /* Reduce the size of the calendar */
  .small-calendar :deep(.el-calendar-table td) {
    height: 30px; /* Reduce row height */
    font-size: 12px; /* Reduce font size */
    padding: 2px;
  }
  
  /* Reduce the calendar header size */
  .small-calendar :deep(.el-calendar__header) {
    font-size: 14px;
    padding: 8px;
  }
  
  /* Reduce the size of date numbers */
  .small-calendar :deep(.el-calendar-day) {
    font-size: 12px;
    padding: 2px;
    height: 30px;
  }
  
  .time-slot-section {
    flex: 1;
  }
  
  .time-slot-section h3 {
    margin-bottom: 1rem;
  }
  
  .time-slots {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 0.5rem;
  }
  </style>
  