import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import VueResource from 'vue-resource'

Vue.use(VueResource)
Vue.config.productionTip = false

new Vue({
  router,
  store,
  http: {
    emulateJSON: true,
    emulateHTTP: true
  },
  VueResource,
  render: function (h) { return h(App) }
}).$mount('#app')
