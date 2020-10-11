/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const VueRouter = require('vue-router').default;
const Vuex = require('vuex').default;

Vue.use(VueRouter)
Vue.use(Vuex);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const Index = require('./components/IndexComponent').default;
const Details = require('./components/DetailsComponent').default;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const routes = [
    { name: 'index', path: '/', component: Index },
    { name: 'details', path: '/details/:id', component: Details }
]
const router = new VueRouter({
    routes // short for `routes: routes`
})
const genreService = require('./service/GenreService.ts').default;

const store = new Vuex.Store({
    state: {
        genres: []
    },
    getters: {
        getGenreById: (state) => (id) => {
            return state.genres.find(genre => genre.id === id);
        }
    },
    actions: {
        fetchGenres(context) {
            genreService.getGenres().then(response => {
                context.state.genres = response.data.data
            });
        }
    }
});

const app = new Vue({
    el: '#app',
    router,
    store
});
