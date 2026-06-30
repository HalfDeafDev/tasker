<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import DefinitionCard from '@/components/DefinitionCard.vue';

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
    <div class="p-2">
        <h1 class="text-2xl">Tasks</h1>
        <div v-if="instances.length === 0">You have no tasks yet!</div>
        <div v-else class="my-2">
            <div v-for="task in instances" :key="task.id" class="w-1/2">
                <DefinitionCard :task="task" class="my-2"/>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
