require('./bootstrap');
import { createApp } from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import MainPage from './components/MainPage.vue';
import ProductDisplay from './components/ProductDisplay.vue';

const app = createApp({});
app.use(VueAxios, axios);
app.component('main-page', MainPage);
app.component('product-display', ProductDisplay);
app.mount('#app');