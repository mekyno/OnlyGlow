<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import { defineProps } from 'vue';

// Definice props
const props = defineProps({
  members: Object,
  member_categories: Object,
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Panel</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                    
                    <div>
                        
                    <div v-for="(category) in member_categories" :key="id" class="category">
                        <h3>{{ category.name }}</h3>
                        <ul>
                            <li v-for="member in category.members" :key="member.id">
                                {{ member.name }} - {{ member.email }} - {{ member.phone_number }}
                            </li>
                        </ul>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

