import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import Unsplash from 'unsplash-js'
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader

/**
 * Usages
 */
Vue.use(VueRouter)
Vue.use(Vuetify)

/**
 * Components
 */
import App from './components/App'
import Catalog from './components/Catalog'

/**
 * Routes
 * @type {VueRouter}
 */
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'catalog',
            component: Catalog
        }
    ],
});

/**
 * Settings
 */
window.Unsplash = new Unsplash({
    applicationId: process.env.MIX_UNSPLASH_API_KEY,
    secret: process.env.MIX_UNSPLASH_API_SECRET
});

/**
 * Init Vue app
 * @type {Vue | CombinedVueInstance<Vue, object, object, object, Record<never, any>>}
 */
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});