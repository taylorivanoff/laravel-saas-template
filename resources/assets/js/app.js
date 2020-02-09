/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueTimeago from 'vue-timeago';

Vue.use(VueTimeago, {
    name: 'timeago', // component name, `timeago` by default
    locale: 'en-US',
    locales: {
        // you will need json-loader in webpack 1
        'en-US': require('vue-timeago/locales/en-US.json')
    }
});

import VModal from 'vue-js-modal';
 
Vue.use(VModal, { dynamic: true, injectModalsContainer: true });
 
/*
By default, the plugin will use "modal" name for the component.
If you need to change it, you can do so by providing "componentName" param.
 
Example:
 
Vue.use(VModal, { componentName: "foo-modal" })
...
<foo-modal name="bar"></foo-modal>
*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

/**
 * Account
 */

Vue.component(
    'update-card',
    require('./components/account/UpdateCard.vue')
);

/**
 * Plans
 */

Vue.component(
    'plan',
    require('./components/plans/Plan.vue')
);

const app = new Vue({
    el: '#app'
});

var distance = $('.navbar').height() / 2;

$(window).scroll(function() {
    if ($(this).scrollTop() >= distance) {
        $('.navbar').addClass('shadow-sm');
    } else {
        $('.navbar').removeClass('shadow-sm');
    }
});









