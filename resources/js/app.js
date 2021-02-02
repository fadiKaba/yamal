require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'

import Navbar from './components/Navbar';
import Cover from './components/Cover';
import Collection from './components/Collection';
import Product from './components/Product';
import Videos from './components/Videos';
import Foot from './components/Foot';

const app = new Vue({
    el: '#app',
    components:{Navbar, Cover, Collection, Product, Foot, Videos}
});
