import axios from "axios";
import store from '@/store'

axios.defaults.headers.common["Accept"] =  "*!/!*";
axios.defaults.headers.common["Content-Type"] =  "application/json";
axios.defaults.baseURL = process.env.VUE_APP_API_URL;

if (store.getters.isLoggedIn === true) {
    axios.interceptors.request.use(async (config) => {
            if (config.headers) {
                config.headers['Authorization'] = `Bearer ${store.getters.accessToken}`;
                return config;
            }
            return config;
        }, (error) => {
            Promise.reject(error);
        }
    );
}
export default axios

