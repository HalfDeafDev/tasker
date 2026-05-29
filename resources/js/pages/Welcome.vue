<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard, login } from '@/routes';
import { register } from '@/routes';
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div>
        <header>
            <nav>
                <Link
                    v-if="$page.props.auth.user"
                    :href="dashboard()"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="login()"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="register()"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>
        <div>
            <main>
                Must login to see dashboard.
            </main>
        </div>
    </div>
</template>
