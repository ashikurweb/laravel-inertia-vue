<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';


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
          <TextInput
            v-model="form.name"
            label="Full Name"
            id="name"
            placeholder="Enter your name"
            :error="form.errors.name"
            />
  
          <!-- Email Field -->
          <TextInput
            v-model="form.email"
            type="email"
            label="Email Address"
            id="email"
            placeholder="Enter your email"
            :error="form.errors.email"
            />
  
          <!-- Password Field -->
          <TextInput
            v-model="form.password"
            type="password"
            label="Password"
            id="password"
            placeholder="Enter your password"
            :error="form.errors.password"
            />
  
          <!-- Confirm Password Field -->
          <TextInput
            v-model="form.password_confirmation"
            type="password"
            label="Confirm Password"
            id="password_confirmation"
            placeholder="Confirm your password"
            />
  
          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full py-3 mt-6 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 transition duration-200 flex justify-center items-center gap-2"
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
            <Link :href="route('login')" class="text-indigo-600 hover:text-indigo-500 hover:underline">Login</Link>
          </p>
        </div>
      </div>
    </div>
  </template>