require('./vue-asset');
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


Vue.use(VueIziToast);
Vue.component('add-rates', require('./components/rates/AddRate.vue').default);
Vue.component('view-rates', require('./components/rates/ViewRates.vue').default);

Vue.component('add-timing', require('./components/Timings/AddTiming.vue').default);
Vue.component('view-timings', require('./components/Timings/ViewTiming.vue').default);

Vue.component('add-timing-override', require('./components/TimingsOverride/AddTimingOverrides.vue').default);
Vue.component('view-timings-override', require('./components/TimingsOverride/ViewTimingOverrides.vue').default);

Vue.component('add-timing-service', require('./components/NoOfCleaning/AddService.vue').default);
Vue.component('view-timings-service', require('./components/NoOfCleaning/ViewService.vue').default);

Vue.component('add-service', require('./components/Services/AddService.vue').default);
Vue.component('view-services', require('./components/Services/ViewService.vue').default);

var app = new Vue({

    el: '#cleanly'
});
