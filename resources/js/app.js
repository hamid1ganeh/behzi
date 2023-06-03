/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import 'lity';

import VueGoodWizard from 'vue-good-wizard';

Vue.use(VueGoodWizard);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import vSelect from 'vue-select';
Vue.component('v-select', vSelect);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-form', require('./components/LoginForm.vue').default);
Vue.component('login-form-modal', require('./components/LoginFormModal.vue').default);
Vue.component('work-time-form', require('./components/WorkTimeForm.vue').default);
Vue.component('image-list', require('./components/ImageList.vue').default);
Vue.component('connection-list', require('./components/ConnectionList.vue').default);
Vue.component('phone-list', require('./components/PhoneList.vue').default);
Vue.component('ticket-chat', require('./components/TicketChat.vue').default);
Vue.component('connection-link-store-modal', require('./components/ConnectionLinkStoreModal.vue').default);
Vue.component('stepper', require('./components/stepper.vue').default);


//user panel page edit
Vue.component('basic-data',require('./components/page-editor/BasicData').default);
Vue.component('image-data',require('./components/page-editor/ImageData').default);
Vue.component('address-data',require('./components/page-editor/AddressData').default);
Vue.component('update-domain',require('./components/page-editor/UpdateDomain').default);



//element
Vue.component('simple-button', require('./components/elements/SimpleButton.vue').default);
Vue.component('simple-select', require('./components/elements/SimpleSelect.vue').default);
Vue.component('vue-date-picker', require('./components/elements/VueDatePicker.vue').default);
Vue.component('modal-button', require('./components/elements/ModalButton.vue').default);
Vue.component('cropper', require('./components/Cropper.vue').default);
Vue.component('cropper-single', require('./components/CropperSingle.vue').default);
Vue.component('behzi-alert', require('./components/elements/BehziAlert').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Front
Vue.component('drag-scroll', require('./components/front/DragScroll').default);
Vue.component('search-filter-inline', require('./components/front/SearchFilterInline').default);
Vue.component('rate-panel', require('./components/front/RatePanel').default);
Vue.component('filter-form', require('./components/front/FilterForm').default);
Vue.component('sort-section', require('./components/front/SortSection').default);


export const bus = new Vue();
const app = new Vue({
    el: '#app'
});

