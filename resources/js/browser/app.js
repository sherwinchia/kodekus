import 'alpinejs';
import Swiper from 'swiper/bundle';
import "highlight.js/styles/dracula.css";

import 'swiper/swiper-bundle.css';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

try {
  window.$ = window.jQuery = require('jquery');

  // let token = document.head.querySelector('meta[name="csrf-token"]');

  // if (token) {
  //     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
  // } else {
  //     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
  // }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

window.hljs = require('highlight.js');
hljs.initHighlightingOnLoad();

let swiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerGroup: 3,
  loopFillGroupWithBlank: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    dynamicBullets: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
})

// window.onscroll = function() {myFunction()};

// function myFunction() {
// var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
// var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
// var scrolled = (winScroll / height) * 100;
// document.getElementById("myBar").style.width = scrolled + "%";
// }  