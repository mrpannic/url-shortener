import { createApp } from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import router from './router';

import App from './components/App.vue';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"]').value;
axios.defaults.baseURL = '/api/';

const app = createApp(App);

app.use(router);
app.use(VueAxios, axios);
app.mount('#app');
