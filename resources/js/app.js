
require('./bootstrap')
import App from './App.vue'
import axios from 'axios'
import router from './router'
import { mapStateTwoWay } from 'vuex-map-state';

import store from './store';
import { createApp } from "vue";
//import { createStore } from "vuex";

const app = createApp(App)
app.config.globalProperties.$axios = axios;
app.use(router)
app.use(store)

app.use({mapStateTwoWay})

app.mount('#app')
