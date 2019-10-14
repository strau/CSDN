/**
 * 定义所有的前端路由
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

// import AdminIndex from '../views/Admin/index/Index';
const AdminIndex = () => import('../views/admin/index/Layout');
const Index = () => import('../views/admin/index/Index');

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin',
            name: 'admin',
            component: AdminIndex,
            children : [
                {
                    path: '/admin/index',
                    name: 'admin_index',
                    component: Index,
                },
            ]
        },
    ],
});