import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from './router'
import store from './store'
import vueHeadful from 'vue-headful'
import VueTimers from 'vue-timers'
// import VueCarousel from 'vue-carousel';

// Vue.use(VueCarousel);
Vue.component('vue-headful', vueHeadful);
// Vue.use(VueTimers);
Vue.config.productionTip = false

// Comment for Debugging Mode
Vue.config.devtools = false;
Vue.config.debug = false;
Vue.config.silent = true; 

new Vue({
  vuetify,
  router,
  store,  
  render: h => h(App)
}).$mount('#app')
