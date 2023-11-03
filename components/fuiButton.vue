<template>
  <button class="btn" @click="handleButtonClicked">
    <slot></slot>
  </button>
</template>

<script setup lang="ts">
const emit = defineEmits<{
  (e: "click"): void;
}>();

const handleButtonClicked = () => {
  emit("click");
};
</script>

<style lang="postcss" scoped>
.btn {
  @apply bg-gray-light border border-gray-dark text-gray-dark mx-2 rounded py-1 px-3 hover:bg-gray hover:text-gray-light hover:border-gray transition-all;
}
</style>
