import VueRouter from "vue-router";

import MainPage from "@/components/MainPage";

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'main',
            component: MainPage
        },
        {
            path: '/messages',
            name: 'messages',
            component: MainPage,
            props: (route) => { return route.query || {} }
        }
    ]
})