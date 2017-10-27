import Vue from 'vue'
import axios from 'axios'
import VueQuillEditor from 'vue-quill-editor'

Vue.use(VueQuillEditor)

Vue.component('applications-list', require('./components/ApplicationsList.vue'))
Vue.component('selection-application', require('./components/SelectionApplication.vue'))
Vue.component('job-application', require('./components/JobApplication.vue'))
Vue.component('quill-editor', VueQuillEditor)

const app = new Vue({

    el: '#app',

    data: {

    	message: null,
    },

})