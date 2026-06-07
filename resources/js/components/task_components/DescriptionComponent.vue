<script setup lang="ts">
type DescriptionContent = {
    id: string
    body: string
}

defineProps<{
    component: DescriptionContent
}>()

</script>

<template>
    <p>
        {{ component.body }}
    </p>
</template>
