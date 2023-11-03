export const usePageController = () => {
  const appStore = useAppStore();

  const config = useConfig();

  /**
   * Refresh config to get / set apiUrl
   *
   * @param cb Refresh callback
   */
  const refreshConfig = async (cb: () => void) => {
    await config.refresh((data) => {
      appStore.updateApiUrl(data.API_URL);
      cb();
    });
  };

  /**
   * API Object
   */
  const api = {
    init: () => {
      return new Promise((resolve) => {
        if (!appStore.hasApiUrl()) {
          refreshConfig(() => {
            resolve(true);
          });
        } else {
          resolve(true);
        }
      });
    },
    get: async (endpoint: string) => {
      const url = appStore.apiUrl + endpoint;
      const token = "12346";
      const options = { headers: {} };
      options.headers.Authorization = `Bearer ${token}`;

      const elements = await useFetch(url, options);
      return elements;
    },
  };

  return { api };
};
