
require('./bootstrap');
import Toasted from 'vue-toasted';
import { InertiaApp } from "@inertiajs/inertia-vue";
import Vue from "vue";
import CKEditor from 'ckeditor4-vue';
import VueSwal from 'vue-swal';
import VueClipboard from 'vue-clipboard2';
 
Vue.use(VueClipboard)
Vue.use(VueSwal)
Vue.use(Toasted)
Vue.use(InertiaApp);
Vue.use( CKEditor );

const app = document.getElementById("app");

new Vue({
  render: h =>
    h(InertiaApp, {
      props: {
        initialPage: JSON.parse(app.dataset.page),
        resolveComponent: name => require(`./Pages/${name}`).default
      }
    })
}).$mount(app);
