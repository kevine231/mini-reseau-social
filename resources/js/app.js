import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import Wizard from './components/RegisterWizard.vue';

const app = createApp({});
app.component('register-wizard', Wizard);
app.mount('#app');


window.Alpine = Alpine;

Alpine.start();
