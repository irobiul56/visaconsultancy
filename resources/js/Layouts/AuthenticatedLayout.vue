<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import SidebarLink from '@/Components/SidebarLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const isSidebarOpen = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="border-b border-gray-100 bg-white">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <button @click="isSidebarOpen = true" class="text-gray-700 text-2xl pr-10">
                                &#9776;
                            </button>
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink :href="route('service.index')" :active="route().current('service.index')">
                                    Services
                                </NavLink>
                                <NavLink :href="route('study-abroad.index')" :active="route().current('study-abroad.index')">
                                    Study Abroad
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:ms-6 sm:flex sm:items-center">
                            <!-- Settings Dropdown -->
                            <div class="relative ms-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                                                {{ $page.props.auth.user.name }}
                                            </button>
                                        </span>
                                    </template>
                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Sidebar -->
            <div v-if="isSidebarOpen" class="fixed inset-0 bg-black bg-opacity-50 z-40" @click="isSidebarOpen = false"></div>
            <div :class="{'-translate-x-full': !isSidebarOpen}" class="fixed top-0 left-0 w-64 h-full bg-gray-800 text-white transform transition-transform duration-300 z-50">
                <div class="flex justify-between items-center p-4">
                    <span class="text-lg font-bold">Sidebar</span>
                    <button @click="isSidebarOpen = false" class="text-white text-2xl">&times;</button>
                </div>
                <ul>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer"><SidebarLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard </SidebarLink></li>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer"><SidebarLink :href="route('register-customer.index')" :active="route().current('register-customer.index')">Register Customer List </SidebarLink></li>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer"><SidebarLink :href="route('contact-list.index')" :active="route().current('contact-list.index')">Contact List </SidebarLink></li>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer"><SidebarLink :href="route('step.index')" :active="route().current('step.index')">5 Steps </SidebarLink></li>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer">About</li>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer"><SidebarLink :href="route('study-abroad.index')" :active="route().current('study-abroad.index')">Study Abroad </SidebarLink></li>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer"><SidebarLink :href="route('service.index')" :active="route().current('service.index')">Services </SidebarLink></li>
                    <li class="p-4 hover:bg-gray-700 cursor-pointer">Requirment</li>
                </ul>
            </div>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>