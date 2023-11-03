export interface ConfigWrapper {
  server: any;
  data: Record<string, any>;
  get?: (key: string) => any;
  set?: (key: string, value: any) => void;
  refresh: (cb: (data: any) => void) => void;
}
