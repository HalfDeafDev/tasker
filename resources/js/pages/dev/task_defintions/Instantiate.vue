<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import { Link } from '@inertiajs/vue3';

type Task = {
    id: string;
    title: string;
};

defineProps<{
    definitions: Task[];
}>();
</script>

<template>
    <div v-if="definitions.length === 0">You have no definitions yet!</div>
    <div v-else>
        <div v-for="task in definitions" :key="task.id">
            <p>
                <Link :href="`/definitions/${task.id}`">
                    {{ task.title }}
                </Link>
            </p>
        </div>
    </div>
</template>

<style scoped></style>
