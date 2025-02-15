<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import Topbar from '@/Components/Topbar.vue';
</script>

<template>
    <div>
        <Topbar/>
        <Header/>
            
    
        <slot />
        <Footer/>
    </div>
</template>
<style scoped>
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

.logo img {
  height: 70px;
  width: 90px;
}

.navbar {
  display: flex;
  gap: 1.5rem;
}

.navbar a {
  text-decoration: none;
  color: #2c3e50;
  font-weight: 500;
  padding: 0.5rem;
  border-radius: 4px;
  transition: background-color 0.3s, color 0.3s;
}

.navbar a:hover {
  background-color: #e5e7eb;
  color: #1d4ed8;
}

.menu-icon {
  display: none;
  font-size: 1.8rem;
  cursor: pointer;
  color: #2c3e50;
}

.buttons a,
button {
  text-decoration: none;
  padding: 0.7rem 1.5rem;
  font-size: 0.9rem;
  font-weight: 600;
  border-radius: 5px;
  color: white;
  background: #049191;
  transition: background 0.3s;
}

.buttons a:hover {
  background: #1e40af;
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