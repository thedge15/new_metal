<template>
    <div class="w-96 mx-auto">
        <input v-model="title" placeholder="Марка стали"
               class="w-full h-10 border border-gray-300 rounded-xl text-center">
        <div class="">
            <button @click.prevent="addSteelGrade" type="button" class="text-gray-900 mt-4 left-0 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br
        focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5
        py-2.5 text-center mr-auto mb-2">Добавить марку стали
            </button>
        </div>
    </div>
    <div class="w-2/6 mx-auto text-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Марки стали
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite
                        products designed to help you work and play, stay organized, get answers, keep in touch, grow
                        your business, and more.</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Марка стали
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Редактировать</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="grade in steel_grades" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ grade.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ grade.title }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <router-link :to="{ name: 'metal.steel.show', params: {id: grade.id} }">Edit</router-link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

export default {
    name: "Steel",

    data() {
        return {
            steel_grades: [],
            title: '',
        }
    },

    mounted() {
        this.getSteelGrades()
    },

    methods: {
        getSteelGrades() {
            axios.get('/api/steel_grade').then(res => {
                this.steel_grades = res.data.data
            })
        },

        addSteelGrade() {
            axios.post('/api/steel_grade', {
                title: this.title
            }).then(res => {
                this.title = ''
                this.getSteelGrades()
            })
        },
    }
}
</script>

<style scoped>

</style>
