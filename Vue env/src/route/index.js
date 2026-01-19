import { createWebHistory, createRouter } from "vue-router";
import store                from "@/store";

/* Auth Components */
import AuthLayout           from '@/layouts/AuthLayout';
import Login                from '@/pages/auth/login';

/*Admin layout*/
import AdminLayout          from '@/layouts/AdminLayout';
import dashboard            from '@/pages/dashboard';
import UserList             from '@/pages/user/UserList';

const routes = [
    {
        path: "/",
        component: AuthLayout,
        children: [
            { path: "/", name: "Login", component: Login },
            { path: "/login", name: "LoginRoute", component: Login },
        ],
        meta: {title: 'Login'}
    },
    {
        path: "/",
        component: AdminLayout,
        children: [
            { path: "/dashboard", name: "dashboard", component: dashboard },
            { path: "/user-list", name: "UserList", component: UserList },
        ],
        meta: {title: 'Dashboard'}
    },
    /*{
        path: "/:catchAll(.*)",
        name: "NotFound",
        component: NotFound,
        meta: {title: '404 Not Found'}
    }*/
];

const router = createRouter({
    history: createWebHistory(),
    routes,
     /*scrollBehavior() {
         document.getElementById('mainBody').scrollIntoView({ behavior: 'smooth', block: 'start' });
     },*/
});

router.beforeEach((toRoute, fromRoute, next) => {
    window.document.title = toRoute.meta && toRoute.meta.title ? "EMR | " + toRoute.meta.title : 'Login';
    if (toRoute.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn === false) {
            next({
                path: '/login',
            })
        } else {
            next()
        }
    } else {
        next()
    }
});

export default router;