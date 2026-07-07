<script setup lang="ts">
type componentStructure = {
    id: string
    due_date: string
}

defineProps<{
    component: componentStructure
}>()

</script>

<template>
    <p>
        Task is due on {{ component.due_date }}
    </p>
</template>
