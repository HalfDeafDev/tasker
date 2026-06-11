<script setup lang="ts">
// type TaskType = {
//     id: string
//     name: string
// }

import { Link } from '@inertiajs/vue3';

type Definition = {
    id: string;
    title: string;
};

defineProps<{
    definitions: Definition[];
}>();

function instantiateDefinition() {

}
</script>

<template>
    <div v-if="definitions.length === 0">You have no definitions yet!</div>
    <div v-else>
        <div v-for="definition in definitions" :key="definition.id">
            <p>
                <Link :href="`/definitions/${definition.id}`">
                    {{ definition.title }}
                </Link>
            </p>
        </div>
    </div>
</template>

<style scoped></style>
