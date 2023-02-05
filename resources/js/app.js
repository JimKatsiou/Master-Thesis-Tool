
require('./bootstrap')
import App from './App.vue'
import axios from 'axios'
import router from './router'
import { mapStateTwoWay } from 'vuex-map-state';
import store from './store';
import moment from 'moment'
import { createApp } from "vue";
//import { createStore } from "vuex";
import { Bar } from 'vue-chartjs'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { faMicrochip } from '@fortawesome/free-solid-svg-icons'
import { faDatabase } from '@fortawesome/free-solid-svg-icons'
import { faGears } from '@fortawesome/free-solid-svg-icons'
import { faGear } from '@fortawesome/free-solid-svg-icons'
/* add icons to the library */
library.add(faUserSecret,faMicrochip,faDatabase,faGears,faGear)


const app = createApp(App)
app.config.globalProperties.$axios = axios;
app.use(router)
app.use(store)
app.use(moment)
app.use(Bar)

app.use({mapStateTwoWay})
.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')
