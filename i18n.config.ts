import * as en from "./locales/en.json";
import * as de from "./locales/de.json";
import * as cz from "./locales/cz.json";

export default defineI18nConfig(() => ({
  legacy: false,
  locale: "cz",
  messages: {
    cz,
    en,
    de,
  },
}));
