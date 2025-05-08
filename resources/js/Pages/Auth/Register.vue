<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const formSubmit = () => {
    form.post(route('register'));
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
              :class="[
                    'w-full px-4 py-2 border rounded-md focus:ring-2 focus:outline-none transition-all duration-300',
                    form.errors.name ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500'
              ]"
              placeholder="Enter your name"
            />
            <!-- Error Message -->
            <small v-if="form.errors.name" class="text-red-500 mt-1">{{ form.errors.name }}</small>
          </div>
  
          <!-- Email Field -->
          <div class="mb-4">
            <label for="email" class="block text-base font-semibold mb-2 text-gray-600">Email Address</label>
            <input
              type="email"
              id="email"
              v-model="form.email"
              :class="[
                    'w-full px-4 py-2 border rounded-md focus:ring-2 focus:outline-none transition-all duration-300',
                    form.errors.email ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500'
                ]"
              placeholder="Enter your email"
            />
            <!-- Error Message -->
            <small v-if="form.errors.email" class="text-red-500 mt-1">{{ form.errors.email }}</small>
          </div>
  
          <!-- Password Field -->
          <div class="mb-4">
            <label for="password" class="block text-base font-semibold mb-2 text-gray-600">Password</label>
            <input
              type="password"
              id="password"
              v-model="form.password"
              :class="[
                    'w-full px-4 py-2 border rounded-md focus:ring-2 focus:outline-none transition-all duration-300',
                    form.errors.password ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500'
                ]"
              placeholder="Enter your password"
            />
            <!-- Error Message -->
            <small v-if="form.errors.password" class="text-red-500 mt-1">{{ form.errors.password }}</small>
          </div>
  
          <!-- Confirm Password Field -->
          <div class="mb-6">
            <label for="password_confirmation" class="block text-base font-semibold mb-2 text-gray-600">Confirm Password</label>
            <input
              type="password"
              id="password_confirmation"
              v-model="form.password_confirmation"
              :class="[
                    'w-full px-4 py-2 border rounded-md focus:ring-2 focus:outline-none transition-all duration-300',
                    form.errors.password ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500'
              ]"
              placeholder="Confirm your password"
            />
          </div>
  
          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 transition duration-200 flex justify-center items-center gap-2"
            :disabled="form.processing"
          >
            <svg 
              v-if="form.processing"
              class="animate-spin h-5 w-5 text-white" 
              xmlns="http://www.w3.org/2000/svg" 
              fill="none" 
              viewBox="0 0 24 24"
            >
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>{{ form.processing ? 'Processing...' : 'Register' }}</span>
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