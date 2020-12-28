import Vue from 'vue'
import VueRouter from 'vue-router'

// page component をインポートする
import PhotoList from './pages/PhotoList.vue'
import Login from './pages/Login.vue'

// vueRouter プラグインを使用する これにより、<RouteView /> component を使用可能になる
Vue.use(VueRouter)


// path と component のマッピング
const routes = [
  {
    path: '/',
    component: PhotoList
  },
  {
    path: '/login',
    component: Login
  }
]

// VueRouterインスタンスの作成
const router = new VueRouter({
  mode: 'history', // history を指定すると、URLにハッシュが記号が付与されないようになる
  routes
})

// VueRouterインスタンスを export する （app.js で import できるようにするため）
export default router
