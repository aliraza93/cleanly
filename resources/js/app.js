/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
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

window.Vue = require('vue');
window.flashVue = new Vue();
window.flashMessageVue = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('booking-summary', require('./components/BookingSummary.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
if (document.getElementById("slider")) {
    const vmHeader = new Vue({
        el: '#slider',
        mounted: function () {
            if (document.getElementsByClassName("flash_msg") != null) {
                //this.showMessage('Component mounted')
            }
        },
        data: {
            email: '',
            zip: '',
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'success_notification'
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'error_notification'
                    },
                }
            }
          },
          methods: {
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(message) {
                return this.$toast.error(' ', message, this.notificationSystem.options.success);
            }
          }
    });
}

if (document.getElementById("booking")) {
    const booking = new Vue({
        el: '#booking',
        mounted: function () {
            console.log('Component Mounted')
            //this.showMessage('Component mounted')
        },
        data: {
            cleaning: {
                standard: 'Standard',
                deep: '',
                move: ''
            },
            time: {
                one_time: '',
                weekly: '',
                bi_weekly: '',
                monthly: ''
            },
            home: {
                bedrooms: '',
                bathrooms: ''
            },
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'success_notification'
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'error_notification'
                    },
                }
            }
          },
          methods: {
            showMessage(message) {
                return this.$toast.success(' ', message, this.notificationSystem.options.success);
            },
            showError(message) {
                return this.$toast.error(' ', message, this.notificationSystem.options.success);
            }
          }
    });
}