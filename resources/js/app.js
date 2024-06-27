import './bootstrap';

import { createApp } from 'vue';
import Card from './components/Card.vue';
import CardAdmin from './components/CardAdmin.vue';
const app = createApp();
app.component("card",Card);
app.component("card-admin",CardAdmin);
app.mount("#app");