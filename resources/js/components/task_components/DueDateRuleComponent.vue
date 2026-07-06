<script setup lang="ts">
type DueDateRuleComponent = {
    id: string
    amount: number
    unit: string
}

defineProps<{
    component: DueDateRuleComponent
}>()

</script>

<template>
    <p>
        Task will be due {{ component.amount }} {{ component.unit }}s after instantiating.
    </p>
</template>
