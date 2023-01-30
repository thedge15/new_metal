<template>
    <div class="w-1/6 mx-auto text-center">
        {{ metal.title }}
        <input v-model="size" placeholder="Добавить размеры" class="w-full h-10 border border-gray-300 rounded-xl text-center mt-3">
        <div v-if="errors">
            <p v-for="error in errors" class="text-sm mt-2 text-red-600">{{ error[0] }}</p>
        </div>
        <div class="">
            <button @click.prevent="addSize" type="button" class="text-gray-900 mt-4 left-0 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br
        focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5
        py-2.5 text-center mr-auto mb-2">Сохранить
            </button>
        </div>
        <input v-model="title" placeholder="Добавить ГОСТ" class="w-full h-10 border border-gray-300 rounded-xl text-center mt-3">
        <div v-if="errors2">
            <p v-for="error in errors2" class="text-sm mt-2 text-red-600">{{ error[0] }}</p>
        </div>
        <div class="">
            <button @click.prevent="addProductStandard" type="button" class="text-gray-900 mt-4 left-0 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br
        focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5
        py-2.5 text-center mr-auto mb-2">Сохранить
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",

    data() {
        return {
            product_id: this.$route.params.id,
            metal: '',
            size: '',
            title: '',
            errors: [],
            errors2: [],
        }
    },

    mounted() {
        this.getMetal()
    },

    methods: {
        addSize() {
            axios.post('/api/sizes', {
                product_id: this.$route.params.id,
                size: this.size,
            }).then(res => {
                this.size = ''
            }).catch(e => {
                this.errors = e.response.data.errors
                this.size = ''
            })
        },

        addProductStandard() {
            axios.post('/api/product_standards', {
                product_id: this.$route.params.id,
                title: this.title,
            }).then(res => {
                this.title = ''
            }).catch(e => {
                this.errors2 = e.response.data.errors
                this.size = ''
            })
        },

        getMetal() {
            axios.get(`/api/metals/${this.$route.params.id}`).
            then(res => {
                this.metal = res.data.data
            })
        }
    },
}
</script>

<style scoped>

</style>
