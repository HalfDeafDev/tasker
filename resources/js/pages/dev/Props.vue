<script setup lang="ts">
const props = defineProps<{
    testProp: {
        message: string;
        value: number;
    } | null;
}>();

const propsExist = props.testProp !== undefined && props.testProp !== null;
</script>

<template>
    <div>
        <div v-if="propsExist">
            Message: {{ testProp?.message }} Value: {{ testProp?.value }}
        </div>
        <div v-else>No prop passed.</div>
    </div>
</template>

<style scoped></style>
