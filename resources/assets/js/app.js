require('./bootstrap');

import Vue from 'vue';
import trumbowyg from 'vue-trumbowyg';
import 'trumbowyg/dist/ui/trumbowyg.css';

window.Vue = Vue;

Vue.use(trumbowyg);

require('./components');

// const app = new Vue({
//     el: '#app'
// });
