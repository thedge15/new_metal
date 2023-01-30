<template>
    <div>
        <div class="flex justify-between p-8 w-2/6 mx-auto">

            <router-link v-if="!token" :to="{ name: 'user.login'}">Login</router-link>
            <router-link v-if="token" :to="{ name: 'metal.metal_list'}">Металлопрокат</router-link>
            <router-link v-if="token" :to="{ name: 'metal.steel'}">Сталь</router-link>
            <router-link v-if="token" :to="{ name: 'main.bush'}">Кусты</router-link>
            <router-link v-if="token" :to="{ name: 'main.material'}">Материалы</router-link>

            <router-link v-if="!token" :to="{ name: 'user.registration'}">Registration</router-link>

            <a v-if="token" @click.prevent="logout" href="#">Logout</a>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            token: null
        }
    },

    mounted() {
        this.getToken()
    },

    watch: {
        $route(to, from) {
            this.getToken()
        }
    },

    methods: {

        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },

        logout() {
            axios.post('/logout')
                .then( res => {
                    localStorage.removeItem('x_xsrf_token')
                    this.$router.push({name: 'user.login'})
                })
        }
    }
}
</script>

<style scoped>

</style>
