<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Card, CardHeader, CardTitle } from '@/components/ui/card';

type Task = {
    id: string;
    title: string;
};

defineProps<{
    task: Task;
}>();
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle>
                <Link :href="`/definitions/${task.id}`">
                    {{ task.title }}
                </Link>
            </CardTitle>
        </CardHeader>
    </Card>
</template>

<style scoped></style>
