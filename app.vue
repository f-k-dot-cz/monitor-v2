<template>
  <div>
    <NuxtPage @refresh-config="refreshConfig" />
  </div>
</template>

<script setup lang="ts">
const refreshConfig = () => {
  console.log("Forcefull config refresh");
};
</script>
