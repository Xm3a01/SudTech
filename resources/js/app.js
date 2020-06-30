
import { InertiaApp } from "@inertiajs/inertia-vue";
import Vue from "vue";
import CKEditor from 'ckeditor4-vue';

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
