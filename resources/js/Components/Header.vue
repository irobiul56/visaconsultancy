
<script setup>
import { ref, onMounted } from "vue";
import { Link } from '@inertiajs/vue3';

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
      <Link :href="route('home')" :active="route().current('home')">Home</Link>
      <Link :href="route('about.page')">About</Link>
      <Link :href="route('studyabroad.all')">Study Abroad</Link>
      <Link :href="route('services.all')" :active="route().current('services.all')">Services</Link>
      <Link :href="route('requirment.page')">Requirement</Link>
      <Link :href="route('contact.us')">Contact</Link>
      <Link :href="route('registration.page')">Register</Link>
      <div class="buttons">
        <Link :href="route('login')" class="button">Log In</Link>
      </div>
    </nav>
  </header>
</template>

<style scoped>
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
</style>