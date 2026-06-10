<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { create } from '@/routes/definitions';

const form = useForm({
    title: '',
    task_type: '',
});

function submitDefinition() {
    form.post(create().url);
}

type TaskType = {
    name : string,
    slug : string
}

defineProps<{
    task_types : TaskType[]
}>();
</script>

<template>
    <div>
        <h2>Create a Definition</h2>
        <form @submit.prevent="submitDefinition">
            <div>
                <label for="title">Title</label>
                <input type="text" v-model="form.title" />
                <div v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
            <div>
                <label for="task_type">Task Type</label>
                <select v-model="form.task_type">
                    <option disabled value="">Choose a task</option>
                    <option
                        v-for="type in task_types"
                        :key="type.slug"
                        :value="type.slug"
                    >
                        {{ type.name }}
                    </option>
                </select>
                <div v-if="form.errors.task_type">{{ form.errors.task_type }}</div>
            </div>
            <button type="submit" :disabled="form.processing">
                Create Definition
            </button>
        </form>
    </div>
</template>

<style scoped></style>
