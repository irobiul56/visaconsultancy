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
       <div class="logo"><img :src="'/storage/image/Visa Consultncy Logo.jpg'" alt=""></div>
        <div class="menu-icon">☰</div>
        <nav class="navbar">
            <a href="#about-us">About Us</a>
            <a href="#contact-us">Contact Us</a>
            <a href="#">Services</a>
            <div class="buttons">
                <a href="#" class="button">Log In</a>
            </div>
        </nav>
    </header>
        <slot />
</template>
