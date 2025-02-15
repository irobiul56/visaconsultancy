<script setup>
import FrontendLayout from '@/Layouts/FronendLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, watch } from "vue";
import { ElMessage } from "element-plus";

const dialogVisible = ref(false);
const step = ref(1);
const selectedDate = ref(new Date());
const selectedTime = ref(null);

const availableTimeSlots = ["11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", "3:00 PM", "4:00 PM", "5:00 PM", "6:00 PM", "7:00 PM"];

const form = useForm({
  name: '',
  email: '',
  phone: '',
  address: '',
  selected_date: '',
  selected_time: ''
});

const openDialog = () => {
  dialogVisible.value = true;
};

// Disable past dates
const disablePastDates = (date) => {
  return date.getTime() < new Date().setHours(0, 0, 0, 0);
};

// Watch for date selection
watch(selectedDate, (newDate) => {
  if (newDate) {
    form.selected_date = newDate.toISOString().split('T')[0];
  }
});

// Handle time slot selection
const selectTimeSlot = (time) => {
  selectedTime.value = time;
  form.selected_time = time;
};

// Handle Continue button
const handleContinue = () => {
  if (step.value === 1) {
    if (!form.selected_date || !form.selected_time) {
      ElMessage.error("Please select a date and time slot.");
      return;
    }
    step.value = 2;
  } else if (step.value === 2) {
    if (!form.name || !form.email || !form.phone || !form.address) {
      ElMessage.error("Please fill all the fields.");
      return;
    }

    form.post(route("appointment.store"), {
      onSuccess: () => {
        ElMessage.success("Appointment booked successfully!");
        dialogVisible.value = false;
        step.value = 1;
        selectedDate.value = new Date();
        selectedTime.value = null;
        form.reset();
      },
      onError: (errors) => {
        console.error("Error:", errors);
        ElMessage.error("There was an error booking the appointment.");
      }
    });
  }
};

</script>

<template>

  <Head title="Welcome" />
  <FrontendLayout>
    <div>
      <section class="hero flex items-center justify-center text-left p-4 gap-8 bg-cover bg-center"
        :style="{ backgroundImage: `url('/storage/image/Background.png')` }">
        <div class="hero-content max-w-1/2">
          <h1 class="text-4xl font-bold text-gray-800 mb-4">Expert Guidance for Student Visas</h1>
          <p class="text-lg text-gray-600 mb-8">Do you want to apply for a higher education study program in the USA?
            <br> To study in the US or any other country as an international student, you must get a student visa.
          </p>
          <div class="buttons flex gap-4">
            <button @click="openDialog"
              class="bg-teal-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-teal-700 transition-colors">Book
              Appointment</button>
            <a href="#"
              class="bg-teal-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-teal-700 transition-colors">E-Visa
              Service</a>
          </div>
          <p class="star text-sm mt-4">Excellent <span class="text-blue-600">★★★★★</span> Trusted by 3.2M+ Students</p>
        </div>
        <div class="hero-image">
          <img class="max-w-full h-auto rounded-lg" :src="'/storage/image/Study Abroad.png'" alt="Travel illustration">
        </div>
      </section>

      <section class="why-choose" id="about-us">
        <img src="https://unispaces.sgp1.cdn.digitaloceanspaces.com/nebula/images/1716835035743.svg"
          alt="Why choose illustration">
        <div class="why-choose-content">
          <h2>Why Choose Visa Consulting Agency for your higher education <span style="color: #2563eb;">visa
              processing</span> needs?</h2>
          <p> There are lots of visa processing support centers in Bangladesh but when you look for expertise and
            experience, few of them are worthy to qualify. Some visa processing centers have reliability issues because
            they don’t have a secure server system. This creates the possibility of visa rejection.</p>
          <p>Simsam Visa Consulting Agency is an authorized and leading Student Visa Consultancy firm in Dhaka,
            Bangladesh. In terms of expertise and experience, Simsam Visa Consulting Agency is the only place where
            people can get reliable service. Our knowledge of different visa policies is authentic and professional.</p>
          <p>Simsam Visa Consulting Agency is a technology-based visa service provider in Bangladesh. we are providing
            guidance and assistance to prospective students are intending to go to The United States of America for
            higher education. You can get top to bottom visa processing service in our office or even online. We have an
            upcoming plan to extend our services to the students for higher education in the United Kingdom, Canada, New
            Zealand, Australia, China, UAE, and the others European countries.</p>
          <p>Simsam Visa Consulting Agency assists students with the best and excellent services according to the needs
            of students like the IELTS training course, Duolingo Tutoring Services, SOP/Personal Statement/Scholarship
            Essay Writing etc. Our Counselors, Mentors, and Teachers are a dedicated team to ensure every student with
            adhesive training and guidance throughout their journey of higher education.</p>
          <p><strong>We always try to deliver friendly and professional services.</strong></p>
        </div>
      </section>

      <section class="visa-steps">
        <h2>Get your <span style="color: #2563eb;">Visa</span> within <span style="color: #2563eb;">5 Steps</span></h2>
        <div class="steps-container">
          <div class="step">
            <div class="step-number">01</div>
            <img :src="'/storage/image/process.png'" alt="Step 1">
            <h3>Application process </h3>
            <p>First, you need to know about <a href="#" style="color: blue;">required documents</a> for visa
              processing in Bangladesh.</p>
          </div>
          <div class="step">
            <div class="step-number">02</div>
            <img
              src="https://visathing.com/_next/image/?url=https%3A%2F%2Funispaces.sgp1.cdn.digitaloceanspaces.com%2Fnebula%2Fimages%2F1704188476172.png&w=1920&q=75"
              alt="Step 1">
            <h3>Create Visa Consultancy! Account</h3>
            <p>After, knowing the required documents, you can open an account on the Visa Consultancy online portal.</p>
          </div>
          <div class="step">
            <div class="step-number">03</div>
            <img
              src="https://visathing.com/_next/image/?url=https%3A%2F%2Funispaces.sgp1.cdn.digitaloceanspaces.com%2Fnebula%2Fimages%2F1704188580898.png&w=1920&q=75"
              alt="Step 2">
            <h3>Upload Your Documents</h3>
            <p>After completing your Visa Consultancy account, you need to upload all the necessary documents. Kindly
              scan all the required documents properly.</p>
          </div>
          <div class="step">
            <div class="step-number">04</div>
            <img
              src="https://visathing.com/_next/image/?url=https%3A%2F%2Funispaces.sgp1.cdn.digitaloceanspaces.com%2Fnebula%2Fimages%2F1704188609106.png&w=1920&q=75"
              alt="Step 3">
            <h3>Embassy Approval</h3>
            <p>After uploading all the required documents, Visa Consultancy will start your desired visa processing and
              send it to the embassy.</p>
          </div>
          <div class="step">
            <div class="step-number">05</div>
            <img
              src="https://visathing.com/_next/image/?url=https%3A%2F%2Funispaces.sgp1.cdn.digitaloceanspaces.com%2Fnebula%2Fimages%2F1704188650177.png&w=1920&q=75"
              alt="Step 4">
            <h3>Get Your Visa</h3>
            <p>After the embassy gives you visa approval, you will get your visa copy.</p>
          </div>
        </div>
      </section>

      <section class="visa-appointment">
        <div class="container">
          <div class="appointment-content">

            <!-- Left Text Content -->
            <div class="text-content">
              <h2>
                Get <span class="highlight">Visa Consultancy</span>
                <span class="blue-text">Free Appointment</span>
              </h2>
              <p>
                Make your appointment with Visa Consultancy through the appointment portal. Click on an appointment,
                choose your visa type, and pick an available slot. Attend the Visa Consultancy office on time with the
                required documents. Stay updated for smooth visa processing with Visa Consultancy.
              </p>

              <p>
                You can start your visa application journey by contacting Visa Consultancy. There is only one branch
                of Visa Consultancy in Dhaka, Bangladesh. You can also apply to the Visa Consultancy online portal to
                reduce
                your visa processing time.
              </p>

              <p class="opening-hours">
                <strong>Opening Hours:</strong> 9:30 AM to 6:30 PM (Bangladesh Time)
              </p>

              <!-- Buttons -->
              <div class="buttons">
                <button class="btn book-btn">Book Appointment</button>
                <button class="btn whatsapp-btn">
                  <img :src="'/storage/image/whatsapp.png'" alt="WhatsApp" class="whatsapp-icon" />
                  Ask Question
                </button>
              </div>
            </div>

            <!-- Right Image -->
            <div class="image-container">
              <img src="https://visathing.com/images/landing/appointment.svg" alt="Appointment Image"
                class="appointment-image" />
            </div>
          </div>
        </div>
      </section>
      <div>
        <el-dialog v-model="dialogVisible" title="Book an Appointment" width="50%">
          <div v-if="step === 1" class="appointment-container">
            <div class="calendar-section">
              <el-calendar v-model="selectedDate" :disabled-date="disablePastDates" class="small-calendar" />
            </div>

            <div class="time-slot-section">
              <h3>Select a time</h3>
              <div class="time-slots">
                <el-button v-for="(time, index) in availableTimeSlots" :key="index" size="small"
                  :type="selectedTime === time ? 'primary' : 'default'" @click="selectTimeSlot(time)">
                  {{ time }}
                </el-button>
              </div>
            </div>
          </div>

          <div v-if="step === 2" class="form-container">
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
                <textarea v-model="form.address" id="address" name="address" rows="4" placeholder="Write your address"
                  required></textarea>
              </el-form-item>
            </el-form>
          </div>

          <template #footer>
            <el-button @click="dialogVisible = false">Cancel</el-button>
            <el-button type="primary" @click="handleContinue">Continue</el-button>
          </template>
        </el-dialog>
      </div>
    </div>
  </FrontendLayout>
</template>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Arial', sans-serif;
  background-color: #f8fafc;
  color: #2c3e50;
  line-height: 1.6;
}

header {
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 0.5rem 4rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  z-index: 1000;
}

.buttons a.create-profile {
  background: #049191;
}

.buttons a.create-profile:hover {
  background: #15803d;
}

.hero {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: left;
  padding: 0rem 1rem;
  gap: 2rem;
  background-image: url('/storage/app/public/image/Background.png');
}

.hero-content {
  max-width: 50%;
}

.hero h1 {
  font-size: 2.5rem;
  margin-bottom: 1rem;
  color: #1e293b;
}

.hero p {
  font-size: 1.1rem;
  margin-bottom: 2rem;
  color: #4b5563;
}

.hero .star {
  font-size: 12px;
}

.hero-image img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
}

.visa-steps {
  padding: 2rem 1rem;
  text-align: center;
  background-color: #ffffff;
}

.visa-steps h2 {
  font-size: 2rem;
  margin-bottom: 1.5rem;
  color: #1e293b;
}

.steps-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(237px, 1fr));
  gap: 0.5rem;
  padding: 1rem;
}

.step {
  background-color: #ffffff;
  border: 2px solid #d1d5db;
  border-radius: 12px;
  padding: 1.5rem;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s, box-shadow 0.3s;
  position: relative;
}

.step:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
}

.step img {
  max-width: 80px;
  height: auto;
  margin: auto;
  margin-bottom: 1rem;

}

.step h3 {
  font-size: 1rem;
  margin-bottom: 0.5rem;
  color: #1e293b;
}

.step p {
  font-size: 0.95rem;
  color: #4b5563;
}

.step-number {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 2rem;
  font-weight: bold;
  color: #e5e7eb;
}

.why-choose {
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding: 1rem 2rem;
  background-color: #f8f9fa;
}

.why-choose img {
  max-width: 50%;
  height: auto;
  border-radius: 8px;
}

.why-choose-content {
  max-width: 50%;
  padding-left: 1rem;
  margin-top: 20px;
}

.why-choose-content h2 {
  font-size: 2rem;
  margin-bottom: 1rem;
  color: #1e293b;
}

.why-choose-content p {
  font-size: 1rem;
  color: #4b5563;
  margin-bottom: 1rem;
}

@media (max-width: 768px) {
  .menu-icon {
    display: block;
  }

  .navbar {
    display: none;
    flex-direction: column;
    background-color: #ffffff;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .navbar.active {
    display: flex;
  }

  .hero {
    flex-direction: column;
    text-align: center;
  }

  .hero-content {
    max-width: 100%;
  }

  .hero-image {
    margin-top: 2rem;
  }

  .why-choose {
    flex-direction: column;
  }

  .why-choose img {
    max-width: 100%;
    margin-bottom: 1.5rem;
  }

  .why-choose-content {
    max-width: 100%;
    padding-left: 0;
  }

  .buttons {
    margin-bottom: 10px;
  }

}

@media (max-width: 480px) {
  .hero h1 {
    font-size: 2rem;
  }

  .hero p {
    font-size: 1rem;
  }
}

/* Visa Appointment Section */
.visa-appointment {
  background-color: #f8f9fa;
  padding: 50px 0;
}

.container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Flexbox Layout for Left Text & Right Image */
.appointment-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
}

/* Left Text Content */
.text-content {
  flex: 1;
  max-width: 50%;
}

h2 {
  font-size: 28px;
  font-weight: bold;
  color: #333;
  margin-bottom: 15px;
}

.highlight {
  color: black;
}

.blue-text {
  color: #007bff;
}

p {
  color: #555;
  font-size: 16px;
  margin: 10px 0;
  line-height: 1.6;
}

.opening-hours {
  color: #444;
  font-weight: bold;
  margin-top: 15px;
}

/* Buttons */
.buttons {
  display: flex;
  gap: 15px;
  /* margin-top: 15px; */
}

.btn {
  padding: 12px 20px;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
}

.book-btn {
  background-color: #4a47a3;
  color: white;
}

.book-btn:hover {
  background-color: #3a3780;
}

.whatsapp-btn {
  background-color: #25d366;
  color: white;
  display: flex;
  align-items: center;
  gap: 8px;
}

.whatsapp-btn:hover {
  background-color: #1eb84d;
}

.whatsapp-icon {
  width: 18px;
  height: 18px;
}

/* Right Image */
.image-container {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  max-width: 50%;
}

.appointment-image {
  width: 100%;
  max-width: 500px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 900px) {
  .appointment-content {
    flex-direction: column;
    text-align: center;
  }

  .text-content,
  .image-container {
    max-width: 100%;
  }

  .image-container {
    justify-content: center;
  }
}

/* Business Network Section */
.business-network {
  background-color: #f9f9f9;
  padding: 50px 0;
}

.container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Layout: Left Content & Right Form */
.network-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
}

/* Left Text Content */
.text-content {
  flex: 1;
  max-width: 45%;
}

h3 {
  font-size: 18px;
  color: #007bff;
  font-weight: bold;
}

h2 {
  font-size: 32px;
  color: #222;
  font-weight: bold;
}

.blue-text {
  color: #007bff;
}

.illustration {
  width: 100%;
  max-width: 400px;
  margin-top: 20px;
}

/* Right Form */
.form-container {
  flex: 1;
  max-width: 100%;
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-container h3 {
  font-size: 18px;
  margin-bottom: 15px;
  color: #333;
}

/* Input Groups */
.input-group {
  display: flex;
  gap: 15px;
}

.input-box {
  flex: 1;
  display: flex;
  flex-direction: column;
  margin-bottom: 15px;
}

label {
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 5px;
}

input,
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
}

/* Phone Number Input */
.phone-input {
  display: flex;
  align-items: center;
  border: 1px solid #ccc;
  border-radius: 6px;
  overflow: hidden;
}

.phone-input .flag-icon {
  background: #f1f1f1;
  padding: 10px;
  font-size: 14px;
  border-right: 1px solid #ccc;
}

.phone-input input {
  border: none;
  flex: 1;
  padding: 10px;
  font-size: 14px;
}

/* Submit Button */
.submit-btn {
  width: 100%;
  padding: 12px;
  background-color: #4a47a3;
  color: white;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
}

.submit-btn:hover {
  background-color: #3a3780;
}

/* Responsive Design */
@media (max-width: 900px) {
  .network-content {
    flex-direction: column;
    text-align: center;
  }

  .text-content,
  .form-container {
    max-width: 100%;
  }

  .input-group {
    flex-direction: column;
  }

  .form-container {
    padding: 20px;
  }
}

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
  height: 30px;
  /* Reduce row height */
  font-size: 12px;
  /* Reduce font size */
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
  height: 20px;
}

.el-calendar-table .el-calendar-day {
  box-sizing: border-box;
  padding: 8px;
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
