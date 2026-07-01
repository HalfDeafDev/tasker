<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { oneOff } from '@/routes/instances/create';

const form = useForm(
    {
        title: ''
    }
)

function submitOneOff() {
    form.post(oneOff().url);
}
</script>

<template>
    <div>
        <h2>One-Off Tasks</h2>
        <form @submit.prevent="submitOneOff">
            <div>
                <label for="title">Title</label>
                <input type="text" v-model="form.title" />
                <div v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>

            <button type="submit" :disabled="form.processing">
                Add One-Off Task
            </button>
        </form>
    </div>
</template>

<style scoped></style>
