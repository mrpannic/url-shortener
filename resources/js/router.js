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
                component: () => import('./components/Main/Links.vue'),
            },
            {
                path: '/links/:hash',
                name: 'Link',
                component: () => import('./components/Links/Link.vue'),
            }
        ]
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
