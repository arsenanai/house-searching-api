// resources/js/app.js
import axios from 'axios';
import { createApp } from 'vue';
import HouseSearch from './components/HouseSearch.vue';
import ElementPlus from 'element-plus';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

createApp().mount('#app');

const app = createApp({
    components: { HouseSearch }
});
app.use(ElementPlus);
app.mount('#app');
