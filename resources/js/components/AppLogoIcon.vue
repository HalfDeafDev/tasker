<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

type Props = {
    className?: HTMLAttributes['class'];
};

defineProps<Props>();
</script>

<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 40 42"
        :class="className"
        v-bind="$attrs"
    >
        <path
            fill="currentColor"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M 20.8467 17.9668 L 25 36 L 13 36 L 16.0666 17.9668 C 11.2866 17.9668 8.8966 15.5768 8.8966 20.3568 C 6.5065 17.9668 1.7265 17.9668 4.1165 15.5768 A 4.7996 4.7996 208.3421 0 1 4.1165 10.7968 A 16.9 16.9 210.3771 0 0 16.0666 13.1868 Q 17.5006 12.2308 16.0666 10.7968 T 16.5446 4.1047 T 20.3687 4.1047 T 20.8467 10.7968 T 20.8467 13.1868 A 16.9 16.9 210.3771 0 0 32.7968 10.7968 A 4.7996 4.7996 208.3421 0 1 32.7968 15.5768 C 35.1868 17.9668 30.4067 17.9668 28.0167 20.3568 C 28.0167 15.5768 25.6267 17.9668 20.8467 17.9668"
        />
    </svg>
</template>
