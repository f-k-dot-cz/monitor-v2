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

    <FuiButton @click="router.push('/')">HOME</FuiButton>

    <FuiButton @click="increment()">TEST [{{ count }}]</FuiButton>

    <FuiButton @click="emit('refreshConfig')">Refresh</FuiButton>
  </div>
</template>

<script lang="ts" setup>
import { useI18n } from "#imports";

const router = useRouter();

const counter = useCounterStore();
const { increment } = counter;
const count = computed(() => counter.count);

const { locale } = useI18n();

const emit = defineEmits<{
  (e: "refreshConfig"): void;
}>();
</script>
