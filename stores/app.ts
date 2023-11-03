import { defineStore } from "pinia";

export const useAppStore = defineStore("app", {
  state: () => ({
    apiUrl: "",
    locale: "",
  }),
  getters: {
    getApiUrl: (state) => state.apiUrl,
    getLocale: (state) => state.locale,
  },
  actions: {
    updateApiUrl(url: string) {
      this.apiUrl = url;
    },
    updateLocale(locale: string) {
      this.locale = locale;
    },
    hasApiUrl() {
      return this.apiUrl !== "";
    },
  },
});
