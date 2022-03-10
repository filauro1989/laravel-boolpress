/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import App from './views/App';
import Home from './pages/Home';
import Posts from './pages/Posts';
import About from './pages/About';
import Post from './pages/Post';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/about',
      name: 'about',
      component: About,
    },
    {
      path: '/posts',
      name: 'posts',
      component: Posts,
    },
    {
      path: '/posts/:id',
      name: 'post',
      props: true,
      component: Post,
    },
  ]
})

const app = new Vue({
    el: '#app',
  render: h => h(App),
    router
});