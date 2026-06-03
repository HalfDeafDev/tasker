<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

type Task = {
    id: string
    completed: boolean
    title: string
}

defineProps<{
    task: Task
}>();
</script>

<template>
    <h1>{{task.title}}</h1>
    <p>{{ task.completed }}</p>
</template>

<style scoped></style>
