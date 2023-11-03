import { type ConfigWrapper } from "~/types/common";

/**
 * Base config wrapper
 *
 * @param _configUrl Source config filename inside public directory
 * @returns ConfigWrapper config wrapper object
 */
export const useConfig = (_configUrl: string = "config.json") => {
  const config: ConfigWrapper = {
    server: async () => {
      return await useFetch(_configUrl, {
        onResponse({ response }) {
          config.data = { ...response._data };
        },
      });
    },
    data: {},
    get: (key: string) => {
      return config.data[key] || "";
    },
    refresh: async (cb) => {
      const server = await config.server();
      server.refresh().then(() => {
        cb(config.data);
      });
    },
  };

  return config;
};
