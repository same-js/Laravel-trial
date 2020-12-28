import Vue from 'vue'
// ルーティング定義の import
import router from './router'
// ルートコンポーネントの import
import App from './App.vue';

new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App />'
})
