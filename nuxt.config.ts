// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: [
    [
      "@nuxtjs/i18n",
      {
        vueI18n: "./i18n.config.ts",
      },
    ],
    "@nuxtjs/eslint-module",
    "@nuxtjs/tailwindcss",
    "@pinia/nuxt",
  ],
});
