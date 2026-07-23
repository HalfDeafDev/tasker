<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
// import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { form } from '@/routes/definitions';
import { dashboard } from '@/routes/dev';
import { list as frequencyList } from '@/routes/frequencySet';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dev Dashboard',
                href: dashboard(),
            },
        ],
    },
});
</script>

<template>
    <Head title="Dev Dashboard" />
    <ul>
        <li>
            <Link :href="frequencyList.url()">Frequency Set List</Link>
        </li>
        <li>
            <Link :href="form.url()"> Create Task Definition </Link>
        </li>
    </ul>
</template>
