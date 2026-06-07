<script setup lang="ts">
import type { Component } from 'vue';
import DescriptionComponent from '@/components/task_components/DescriptionComponent.vue';
import type { TaskComponent } from '@/types/component';

const type_mapping: Record<string, Component> = {
    description: DescriptionComponent,
};

defineProps<{
    components: TaskComponent[];
}>();
</script>

<template>
    <div>
        <component
            v-for="taskComponent in components"
            :key="taskComponent.id"
            :is="type_mapping[taskComponent.task_type]"
            :component="taskComponent.content"
        />
    </div>
</template>

<style scoped></style>
