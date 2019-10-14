import Vue from 'vue'
import Admin from '../assets/js/views/admin/index/Layout'

// 引入element-ui
import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';

// 引入前端路由文件
import router from '../assets/js/route/admin_route'
// 引入vuex store
import store from '../assets/js/store/admin_index'

Vue.use(Element)

const app = new Vue({
    el : '#app',
    components : { Admin },
    router,
    store
})