import { createRouter, createWebHashHistory } from "vue-router";

import Main from "./components/Main.vue";

const routes = [
    {
        path: '/',
        component: Main,
        children: [
            {
                path: '/',
                name: 'form',
                component: () => import('./components/Form.vue')
            }
        ]
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
