import { InertiaApp } from '@inertiajs/inertia-vue'
import VueCarousel from 'vue-carousel';
import { VLazyImagePlugin } from "v-lazy-image";

import Vue from 'vue'

import Vuex from 'vuex'


Vue.use(InertiaApp)
Vue.use(VueCarousel)
Vue.use(VLazyImagePlugin);
Vue.use(Vuex)



const app = document.getElementById('app')

new Vue({
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
    },
  }),
}).$mount(app)
