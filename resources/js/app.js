/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import signature from './components/Signature.vue';
import categoryAssigner from './components/CategoryAssigner.vue';
import lengthChecker from './components/CommentLengthChecker.vue';
import LikeButton from './components/LikeButton.vue';
import WeatherPanel from "./components/WeatherPanel";
import CurrencyConverter from "./components/CurrencyConverter";


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('signature-element', require('./components/Signature.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        'signature-element': signature,
        'category-assigner': categoryAssigner,
        'length-checker': lengthChecker,
        'like-btn': LikeButton,
        'weather-panel': WeatherPanel,
        'currency-converter': CurrencyConverter
    }
});
