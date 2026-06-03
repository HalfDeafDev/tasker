<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import { Link } from '@inertiajs/vue3';

type Task = {
    id: string;
    completed: boolean;
    title: string;
};

defineProps<{
    tasks: Task[];
}>();
</script>

<template>
    <div v-if="tasks.length === 0">You have no tasks yet!</div>
    <div v-else>
        <div v-for="task in tasks" :key="task.id">
            <p>
                <Link :href="`/tasks/${task.id}`">
                    ({{ task.completed }}) {{ task.title }}
                </Link>
            </p>
        </div>
    </div>
</template>

<style scoped></style>
