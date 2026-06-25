<script setup lang="ts">
import DefinitionCard from '@/components/DefinitionCard.vue';
import { index } from '@/routes/definitions';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Definitions',
                href: index(),
            },
        ],
    },
});

type Task = {
    id: string;
    title: string;
};

defineProps<{
    definitions: Task[];
}>();
</script>

<template>
    <div class="p-2">
        <h1>Definitions</h1>
        <div v-if="definitions.length === 0">You have no definitions yet!</div>
        <div v-else>
            <div v-for="task in definitions" :key="task.id">
                <DefinitionCard :task="task" />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
