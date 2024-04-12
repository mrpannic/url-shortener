import { createRouter, createWebHashHistory } from "vue-router";

import Main from "./components/Main.vue";

const routes = [
    {
        path: '/',
        component: Main,
        children: [
            {
                path: '/',
                name: 'Home',
                component: () => import('./components/Form.vue')
            },
            {
                path: '/links',
                name: 'Links',
                component: () => import('./components/Main/Links.vue')
            }
        ]
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
