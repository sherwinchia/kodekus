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
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  }
})

document.addEventListener('DOMContentLoaded', function() {
  let prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    let currentScrollPos = window.pageYOffset;
    if (currentScrollPos === 0) {
        document.querySelector(".navbar").style.top = "0";
    } else if (prevScrollpos >= currentScrollPos) {
        document.querySelector(".navbar").style.top = "0";
    } else {
        document.querySelector(".navbar").style.top = "-22%";
    }
    prevScrollpos = currentScrollPos;
  }


  // window.livewire.on('showLoginModal', event => {
  //   let loginModal = document.getElementById('login-modal');
  //   loginModal.classList.remove("hidden");
  //   loginModal.classList.add("flex");
  //   disableScroll();
  // })

  // document.getElementById("close-login-modal-button").addEventListener("click", closeLoginModal());

  // function closeLoginModal(){
  //   let loginModal = document.getElementById('login-modal');
  //   loginModal.classList.remove("flex");
  //   loginModal.classList.add("hidden");
  //   enableScroll();
  // }

  // // modern Chrome requires { passive: false } when adding event
  // var supportsPassive = false;
  // try {
  //   window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
  //     get: function () { supportsPassive = true; } 
  //   }));
  // } catch(e) {}

  // var wheelOpt = supportsPassive ? { passive: false } : false;
  // var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';


  // function disableScroll() {
  //   window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  //   window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  //   window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  //   window.addEventListener('keydown', preventDefaultForScrollKeys, false);
  // }
  
  // // call this to Enable
  // function enableScroll() {
  //   window.removeEventListener('DOMMouseScroll', preventDefault, false);
  //   window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  //   window.removeEventListener('touchmove', preventDefault, wheelOpt);
  //   window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
  // }

  // function preventDefault(e) {
  //   e.preventDefault();
  // }
  
  // function preventDefaultForScrollKeys(e) {
  //   if (keys[e.keyCode]) {
  //     preventDefault(e);
  //     return false;
  //   }
  // }

}, false);
