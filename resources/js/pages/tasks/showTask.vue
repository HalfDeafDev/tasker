<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import TaskComponentViewer from '@/components/task_components/TaskComponentViewer.vue';
import type { Task } from '@/types/component';

defineProps<{
    task: Task;
}>();
</script>

<template>
    <h1>{{ task.title }}</h1>
    <p>{{ task.completed }}</p>
    <p>Created on: {{ task.created_at }}</p>
    <p>Last Updated: {{ task.updated_at }}</p>
    <TaskComponentViewer :components="task.components" />
</template>

<style scoped></style>
