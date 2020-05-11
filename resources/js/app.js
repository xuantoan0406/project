/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

// test single page

import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// * Import các component (App, home, about, service, contact)

import App from "./components/testsingle/App";
import Register from "./components/auth/Register";
import Login from "./components/auth/Login";
import Home from "./components/testsingle/Home";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/logins",
            name: "login",
            component: Login
        },
        {
            path: "/registers",
            name: "register",
            component: Register
        }
    ]
});

// * Truyền route constant router vào ứng dụng Vue mới để có thể access đến this.$router và this.$route

const app = new Vue({
    el: "#app",
    components: { App },
    router
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("register", require("./components/auth/Register.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
