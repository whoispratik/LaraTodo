<template>
<div class="">
  <div class="mx-auto max-w-7xl">
    <div class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-base font-semibold text-white">Task</h1>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <Link as="button" :href="route('todos.create')" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add Task/Todo</Link>
          </div>
        </div>

        <!-- Simple Static Tabs -->
        <div class="border-b border-gray-700 mt-4">
          <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <a href="#" class="border-indigo-500 text-indigo-500 whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">All</a>
            <a href="#" class="text-gray-400 hover:text-gray-300 hover:border-gray-300 whitespace-nowrap border-b-2 border-transparent py-4 px-1 text-sm font-medium">Completed</a>
            <a href="#" class="text-gray-400 hover:text-gray-300 hover:border-gray-300 whitespace-nowrap border-b-2 border-transparent py-4 px-1 text-sm font-medium">Incomplete</a>
          </nav>
        </div>

        <div class="mt-8 flow-root">
          <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <table class="min-w-full divide-y divide-gray-700">
                <thead>
                  <tr>
                    <th scope="col" class="relative px-7 sm:w-12 sm:px-6">
                     <span class="sr-only">Mark</span>
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Title</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Due Date</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Is Complete</th>
                    <th scope="col" class="relative py-3.5 pr-4 pl-3 sm:pr-0">
                      <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="relative py-3.5 pr-4 pl-3 sm:pr-0 text-red-500">
                      <span class="sr-only">Delete</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                  <template v-if="todos.length > 0">
                    
                  <tr v-for="todo in todos" :key="todo.id">
                    <td class="relative px-7 sm:w-12 sm:px-6">
                      <input
                        type="checkbox"
                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                        v-model="todo.is_completed"
                        @change="router.patch(route('todos.mark', todo.id), { is_completed: todo.is_completed })"
                      >
                    </td>
                    <td class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-white sm:pl-0">{{ todo.title }}</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-300">{{ todo.due_date }}</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-300">{{ todo.is_completed ? 'Yes' : 'No' }}</td>
                    <td class="relative py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-0">
                      <Link :href="route('todos.edit', todo.id)" class="text-indigo-400 hover:text-indigo-300">Edit</Link>
                    </td>
                    <td class="relative py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-0">
                      <Link method="delete" as="button" :href="route('todos.destroy', todo.id)" class="text-red-400 hover:text-red-300 cursor-pointer">Delete</Link>
                    </td>
                  </tr>
                  </template>
                  <template v-else>
                    <tr>
                      <td colspan="6" class="px-3 py-4 text-sm text-center text-gray-500">
                        No tasks available.
                      </td>
                    </tr>
                  </template>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';

const props = defineProps({
  todos: Array,
})
</script>
