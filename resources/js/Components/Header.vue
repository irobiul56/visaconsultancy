
<script setup>
import { ref, onMounted } from "vue";

const navbar = ref(null);
const menuIcon = ref(null);

onMounted(() => {
  if (menuIcon.value && navbar.value) {
    menuIcon.value.addEventListener("click", () => {
      navbar.value.classList.toggle("active");
    });
  }
});
</script>

<template>
  <header>
    <div class="logo">
      <img :src="'/storage/image/Visa Consultncy Logo.jpg'" alt="">
    </div>
    <div class="menu-icon" ref="menuIcon">☰</div>
    <nav class="navbar" ref="navbar">
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">About</a>
      <a href="#">Study Abroad</a>
      <a href="#">Services</a>
      <a href="#">Requirement</a>
      <a href="#">Contact</a>
      <a href="#">Register</a>
      <div class="buttons">
        <a :href="route('login')" class="button">Log In</a>
      </div>
    </nav>
  </header>
</template>

<style scoped>
/* Add your styles here */
/* .navbar.active {
  display: block; 
} */
</style>