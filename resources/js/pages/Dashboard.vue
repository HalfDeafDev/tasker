<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
// import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { dashboard } from '@/routes';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});

defineProps<{
    testprop: {
        message: string
        value: number
    }
}>()
</script>

<template>
    <Head title="Dashboard" />

    <div>

    </div>
</template>
