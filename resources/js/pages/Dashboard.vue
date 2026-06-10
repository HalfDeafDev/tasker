<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
// import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { dashboard } from '@/routes';
import { form } from '@/routes/definitions';

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
</script>

<template>
    <Head title="Dashboard" />
    <div>
        <Link :href="form.url()"> Create Task Definition </Link>
    </div>
</template>
