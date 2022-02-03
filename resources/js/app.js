require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue');

Vue.component('chat_wrapper', require('./components/chat_wrapper').default)
Vue.component('test-tg', require('./components/test-tg').default)


const app = new Vue({
    el: '#app',
})
