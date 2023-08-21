import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios';

// import {library} from "@fortawesome/fontawesome-svg-core";
// import {fas} from "@fortawesome/free-solid-svg-icons";
import "bootstrap-icons/font/bootstrap-icons.css"
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
// import "./assets/js/main.js"

import './assets/css/style.css'
import './assets/vendor/bootstrap/css/bootstrap-grid.css'
import './assets/vendor/bootstrap/css/bootstrap.css'
import './assets/vendor/simple-datatables/style.css'
import './assets/vendor/bootstrap/css/bootstrap.min.css'
import './assets/vendor/bootstrap-icons/bootstrap-icons.css'
import '@/assets/vendor/boxicons/css/boxicons.min.css'
import './assets/vendor/quill/quill.snow.css'
// import '@fortawesome/free-solid-svg-icons'
import './assets/vendor/quill/quill.bubble.css'
// import './assets/img/icons/flaticon/flaticon.css'



// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import 'leaflet/dist/leaflet.css';
 

// library.add(fas)



require('@/store/subscriber')


axios.defaults.baseURL = 'http://localhost:8000/api'

import 'bootswatch/dist/darkly/bootstrap.min.css'

store.dispatch('auth/attempt', localStorage.getItem('token')).then(() => {

window.axios = require('axios');
    createApp(App)
    .use(store).use(router).mount('#app')
})

