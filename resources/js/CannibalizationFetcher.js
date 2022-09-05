require('./bootstrap');
import Vue from 'vue';

new Vue({
  render: (h) => h(require("./Pages/CannibalizationFetcher/Index.vue").default)
}).$mount(document.getElementById('cannibalizationFetcherApp'));

