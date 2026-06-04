<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import { Link, useForm } from '@inertiajs/vue3';
import { description } from '@/routes/component/create';

type Task = {
    id: string;
    completed: boolean;
    title: string;
};

defineProps<{
    tasks: Task[];
}>();

const form = useForm({
    task_id: '',
    body: '',
});


function submit() {
    form.post(description().url)
}
</script>

<template>
    <form @submit.prevent="submit">
        <select v-model="form.task_id">
            <option disabled value="">Choose a task</option>
            <option v-for="task in tasks" :key="task.id" :value="task.id">
                {{ task.title }}
            </option>
        </select>
    </form>
</template>

<style scoped></style>
