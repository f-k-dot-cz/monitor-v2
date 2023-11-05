<template>
  <div class="page">
    <Temperature />

    <div class="wrap-test">Test</div>

    <FuiButton @click="increment()">TEST [{{ count }}]</FuiButton>

    <FuiButton @click="emit('refreshConfig')">Refresh</FuiButton>

    <FuiButton @click="router.push('/about')">HOME</FuiButton>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";

const router = useRouter();
const { api } = usePageController();

const emit = defineEmits<{
  (e: "refreshConfig"): void;
}>();

const counter = useCounterStore();
const { increment } = counter;
const count = computed(() => counter.count);

onMounted(() => {
  console.log("Fetching from api delay");
  api.init().then(() => {
    api.get("measurements");
    api.get("users");
  });
});
</script>

<style lang="postcss">
.wrap-test {
  @apply bg-blue text-gray-dark p-2 m-5;
}

.btn {
  @apply bg-gray-light border border-gray-dark text-gray-dark mx-2 rounded py-1 px-3 hover:bg-gray hover:text-gray-light hover:border-gray transition-all;
}
</style>
