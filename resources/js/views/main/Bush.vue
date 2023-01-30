<template>
    <div class="w-96 mx-auto">
        <input v-model="title" placeholder="Наименование куста ГКС"
               class="w-full h-10 border border-gray-300 rounded-xl text-center">
        <div v-if="errors.title">
            <p v-for="error in errors.title" class="text-sm mt-2 text-red-600">{{ error }}</p>
        </div>
        <div class="">
            <button @click.prevent="addBush" type="button" class="text-gray-900 mt-4 left-0 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br
        focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5
        py-2.5 text-center mr-auto mb-2">Добаввить куст
            </button>
        </div>
    </div>
    <div class="w-2/6 mx-auto text-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Кусты ГКС
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Куст
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Редактировать</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="bush in bushes" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ bush.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ bush.title }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <router-link :to="{ name: 'main.bush.project', params: {id: bush.id} }"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        </router-link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Bush",

    data() {
        return {
            title: '',
            bushes: [],
            errors: [],
        }
    },

    mounted() {
        this.getBushes()
    },

    methods: {
        addBush() {
            axios.post('/api/bushes', {
                title: this.title
            }).then(res => {
                this.title = ''
                this.getBushes()
            }).catch(e => {
                this.errors = e.response.data.errors
            })
        },

        getBushes() {
            axios.get('/api/bushes').then(res => {
                this.bushes = res.data.data
            })
        }
    }
}
</script>

<style scoped>

</style>
