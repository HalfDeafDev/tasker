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
    instances: Task[];
}>();
</script>

<template>
    <div v-if="instances.length === 0">You have no tasks yet!</div>
    <div v-else>
        <div v-for="instance in instances" :key="instance.id">
            <p>
                <Link :href="`/tasks/${instance.id}`">
                    ({{ instance.completed }}) {{ instance.title }}
                </Link>
            </p>
        </div>
    </div>
</template>

<style scoped></style>
