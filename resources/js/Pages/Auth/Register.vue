<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const formSubmit = () => {
    console.log(form);
}

</script>

<template>
    <Head title="Register"/>
    <div class="mt-10 flex justify-center items-center py-10">
      <div class="max-w-xl w-full bg-white shadow-[0_3px_10px_rgb(0,0,0,0.2)] rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Create an Account</h2>
  
        <!-- Form Section -->
        <form @submit.prevent="formSubmit">
          <!-- Name Field -->
          <div class="mb-4">
            <label for="name" class="block text-base font-semibold mb-2 text-gray-600">Full Name</label>
            <input
              type="text"
              id="name"
              v-model="form.name"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-300"
              placeholder="Enter your name"
            />
          </div>
  
          <!-- Email Field -->
          <div class="mb-4">
            <label for="email" class="block text-base font-semibold mb-2 text-gray-600">Email Address</label>
            <input
              type="email"
              id="email"
              v-model="form.email"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-300"
              placeholder="Enter your email"
            />
          </div>
  
          <!-- Password Field -->
          <div class="mb-4">
            <label for="password" class="block text-base font-semibold mb-2 text-gray-600">Password</label>
            <input
              type="password"
              id="password"
              v-model="form.password"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-300"
              placeholder="Enter your password"
            />
          </div>
  
          <!-- Confirm Password Field -->
          <div class="mb-6">
            <label for="password_confirmation" class="block text-base font-semibold mb-2 text-gray-600">Confirm Password</label>
            <input
              type="password"
              id="password_confirmation"
              v-model="form.password_confirmation"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-300"
              placeholder="Confirm your password"
            />
          </div>
  
          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 transition duration-200"
          >
            Register
          </button>
        </form>
  
        <!-- Footer Text -->
        <div class="mt-6 text-center text-base font-semibold text-gray-600">
          <p>
            Already have an account? 
            <a href="#" class="text-indigo-600 hover:text-indigo-500">Login</a>
          </p>
        </div>
      </div>
    </div>
  </template>
  
  