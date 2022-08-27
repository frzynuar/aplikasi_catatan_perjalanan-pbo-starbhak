//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/catatan-index',
        name: 'catatan.index',
        component: () => import( /* webpackChunkName: "catatan.index" */ '@/views/catatan/Index.vue')
    },
    {
        path: '/catatan-create',
        name: 'catatan.create',
        component: () => import( /* webpackChunkName: "catatan.create" */ '@/views/catatan/Create.vue')
    },
    {
        path: '/catatan-edit/:id',
        name: 'catatan.edit',
        component: () => import( /* webpackChunkName: "catatan.edit" */ '@/views/catatan/Edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes  // config routes
})

export default router