require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue');

Vue.component('chat-modal', require('./components/chat-modal').default)
Vue.component('test-tg', require('./components/test-tg').default)

const app = new Vue({
    el: '#app',
})