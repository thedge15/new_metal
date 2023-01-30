import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/users/login', component: () => import('../views/user/Login.vue'),
            name: 'user.login'
        },
        {
            path: '/users/registration', component: () => import('../views/user/Registration.vue'),
            name: 'user.registration'
        },
        {
            path: '/main/materials', component: () => import('../views/main/Material.vue'),
            name: 'main.material'
        },
        {
            path: '/main/bushes', component: () => import('../views/main/Bush.vue'),
            name: 'main.bush'
        },
        {
            path: '/main/bushes/:id', component: () => import('../views/main/Project.vue'),
            name: 'main.bush.project'
        },
        {
            path: '/metals/steel', component: () => import('../views/metal/Steel.vue'),
            name: 'metal.steel'
        },
        {
            path: '/metals/steel/:id', component: () => import('../views/metal/SteelShow.vue'),
            name: 'metal.steel.show'
        },
        {
            path: '/metals/metal_list', component: () => import('../views/metal/MetalList.vue'),
            name: 'metal.metal_list'
        },
        {
            path: '/metals/:id', component: () => import('../views/metal/Show.vue'),
            name: 'metal.show'
        },
    ]
})


router.beforeEach((to, from, next) => {

    axios.get('/api/user')
        .catch(e => {
            if (e.response.status === 401) {
                localStorage.key('x_xsrf_token') ? localStorage.removeItem('x_xsrf_token') : ''
            }
        })

    const token = localStorage.getItem('x_xsrf_token')

    if (!token) {
        if (to.name === 'user.login' || to.name === 'user.registration') {
            return next()
        } else {
            return next({
                name: 'user.login'
            })
        }
    }

    if (to.name === 'user.login' || to.name === 'user.registration' && token) {
        return next({
            name: 'main.bush'
        })
    }

    next()

})

export default router
