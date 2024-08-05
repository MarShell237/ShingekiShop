import './bootstrap';

import { createApp, h } from 'vue'
import { createPinia } from 'pinia'

import Card from './components/Card.vue';
import NbPanier from './components/nbPanier.vue';
import Panier from './components/panier.vue';
import Index from './Pages/panier/index.vue';
// import NavBar from './components/nav-bar.vue';
const app = createApp();
const pinia = createPinia()
app.use(pinia)
app.component("card",Card);
app.component("nbPanier",NbPanier);
app.component("panier",Panier)
app.component("index",Index)
// app.component("nav-bar",NavBar)
app.mount("#root");