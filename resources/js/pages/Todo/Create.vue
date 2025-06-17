<template>
    <div class="max-w-lg mx-auto my-8 px-4">
        <form class=" p-6 rounded-lg shadow-md" @submit.prevent="form.post(route('todos.store'))">
            <div class="mb-4">
                <label 
                    for="title" 
                    class="block text-sm font-medium text-gray-500 mb-2"
                >
                    Title:
                </label>
                <input 
                    type="text" 
                    id="title"
                    name="title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    placeholder="Enter title"
                    required
                    v-model="form.title"
                >
                <div 
                    v-if="form.errors.title" 
                    class="text-red-500 text-sm mt-1"> {{ form.errors.title }}</div>
                </div>

            <div class="mb-4">
                <label 
                    for="due_date" 
                    class="block text-sm font-medium text-gray-500 mb-2"
                >
                    Due Date:
                </label>
                <input 
                    type="date" 
                    id="due_date"
                    name="due_date"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required
                    v-model="form.due_date"
                >
                <div 
                    v-if="form.errors.due_date"
                    class="text-red-500 text-sm mt-1"> {{ form.errors.due_date }}</div>
            </div>

            <button 
                type="submit" 
                class="w-full bg-green-500 text-white py-3 px-4 rounded-md hover:bg-green-600 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
            >
                Submit
            </button>
        </form>
    </div>
</template>
<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    due_date: '',
})
</script>