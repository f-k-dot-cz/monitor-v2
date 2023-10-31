import * as en from "./locales/en.json";
import * as fr from "./locales/fr.json";

export default defineI18nConfig(() => ({
  legacy: false,
  locale: "en",
  messages: {
    en: en,
    fr: fr,
  },
}));
