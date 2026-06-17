<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import { useForm } from '@inertiajs/vue3';
import TaskComponentViewer from '@/components/task_components/TaskComponentViewer.vue';
import { instantiate } from '@/routes/definitions';
import type { TaskComponent } from '@/types/component';

type TaskDefinition = {
    id: string;
    title: string;
    created_at: string;
    updated_at: string;
    components: TaskComponent[];
}

const props = defineProps<{
    definition: TaskDefinition;
}>();

const form = useForm({});

function instantiateTask() {
    form.post(instantiate({
        definition: props.definition.id
    }).url);
}
</script>

<template>
    <h1>{{ definition.title }}</h1>
    <p>Created on: {{ definition.created_at }}</p>
    <p>Last Updated: {{ definition.updated_at }}</p>
    <form @submit.prevent="instantiateTask">
        <button type="submit">
            Instantiate
        </button>
    </form>
    <TaskComponentViewer :components="definition.components" />
</template>

<style scoped></style>
