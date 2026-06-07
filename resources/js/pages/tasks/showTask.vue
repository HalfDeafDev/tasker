<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import TaskComponentViewer from '@/components/task_components/TaskComponentViewer.vue';
import type { TaskComponent } from '@/types/component';

type Task = {
    id: string;
    title: string;
    completed: boolean;
    components: TaskComponent[];
};

defineProps<{
    task: Task;
}>();
</script>

<template>
    <h1>{{ task.title }}</h1>
    <p>{{ task.completed }}</p>
    <TaskComponentViewer :components="task.components" />
</template>

<style scoped></style>
