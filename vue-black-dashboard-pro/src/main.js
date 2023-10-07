/*!

  =========================================================
 * Vue Black Dashboard PRO Laravel - v1.1.0
 =========================================================

 * Product Page: https://www.creative-tim.com/product/vue-black-dashboard-pro-laravel
 * Copyright Creative Tim (http://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)

 
 * Coded by www.creative-tim.com & www.updivision.com

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */
import Vue from 'vue';
import VueRouter from 'vue-router';
import RouterPrefetch from 'vue-router-prefetch'
import DashboardPlugin from './plugins/dashboard-plugin';
import App from './App.vue';

// router setup
import router from './router';
import store from "./store";
import i18n from './i18n';
import './registerServiceWorker'

import VueMeta from 'vue-meta'
import IsDemo from './isDemo'
// plugin setup
Vue.use(DashboardPlugin);
Vue.use(VueRouter);
Vue.use(RouterPrefetch);
Vue.use(IsDemo)
Vue.use(VueMeta, { keyName: 'head' })

/* eslint-disable no-new */
new Vue({
  el: '#app',
  render: h => h(App),
  router: router,
  store: store,
  i18n
});
