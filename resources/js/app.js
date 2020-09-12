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

// require('bootstrap-table');
// import 'bootstrap-table/dist/bootstrap-table.css';


window.EditorJS = require('@editorjs/editorjs');
window.Paragraph = require('@editorjs/paragraph');
window.Header = require('@editorjs/header');
window.Quote = require('@editorjs/quote');
window.Warning = require('@editorjs/warning');
window.Delimiter = require('@editorjs/delimiter');
window.List = require('@editorjs/list');
window.ImageTool = require('@editorjs/image');
window.SimpleImage = require('@editorjs/simple-image');
window.LinkTool = require('@editorjs/link');
window.Embed = require('@editorjs/embed');
window.AttachesTool = require('@editorjs/attaches');
window.CodeTool = require('@editorjs/code');
window.RawTool = require('@editorjs/raw');
window.Marker = require('@editorjs/marker');
window.InlineCode = require('@editorjs/inline-code');
window.Undo = require('editorjs-undo');

// Quill Setup
// window.Quill = require('quill');
// window.QuillDeltaToHtmlConverter = require('quill-delta-to-html').QuillDeltaToHtmlConverter;

// Pikaday
// window.Pikaday = require('pikaday/pikaday.js');

//Flatpickr
window.flatpickr = require('flatpickr').default;