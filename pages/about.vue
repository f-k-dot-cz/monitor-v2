<template>
  <div class="wrap">
    <form>
      <select v-model="locale">
        <option value="en">en</option>
        <option value="fr">fr</option>
      </select>
      <p>{{ $t("welcome") }}</p>
    </form>

    <div class="test">Test page {{ $t("welcome") }}</div>

    <div class="dalsi">Nic</div>
  </div>
</template>

<script lang="ts" setup>
import { useI18n } from "#imports";
const { locale } = useI18n();
</script>
