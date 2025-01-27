// resources/js/app.js
import axios from 'axios';
import { createApp } from 'vue';
import HouseSearch from './components/HouseSearch.vue';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

createApp({
    components: { HouseSearch }
}).mount('#app');