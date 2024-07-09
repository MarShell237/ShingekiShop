import './bootstrap';

import { createApp } from 'vue';
import Card from './components/Card.vue';
const app = createApp();
app.component("card",Card);
app.mount("#app");