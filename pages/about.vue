<template>
  <div class="wrap">
    <form>
      <select v-model="locale">
        <option value="cz">cz</option>
        <option value="en">en</option>
        <option value="de">de</option>
      </select>
      <p>{{ $t("welcome") }}</p>
    </form>

    <div class="test">Test page {{ $t("common.outer") }}</div>

    <div class="dalsi"><Temperature /></div>
  </div>
</template>

<script lang="ts" setup>
import { useI18n } from "#imports";
const { locale } = useI18n();
</script>
