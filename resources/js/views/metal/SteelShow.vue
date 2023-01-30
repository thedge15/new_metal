<template>
    <div class="w-1/6 mx-auto text-center">
        {{ steel_grade.title }}
        <input v-model="title" placeholder="Добавить ГОСТ" class="w-full h-10 border border-gray-300 rounded-xl text-center mt-3">
        <div class="">
            <button @click.prevent="addSteelStandard" type="button" class="text-gray-900 mt-4 left-0 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br
        focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5
        py-2.5 text-center mr-auto mb-2">Добавить ГОСТ стали
            </button>
        </div>
    </div>
</template>

<script>

export default {

    name: "SteelShow",

    data() {
        return {
            steel_grade: '',
            steel_grade_id: '',
            title: '',
        }
    },

    mounted() {

        this.getSteelGrade()

    },

    methods: {

        addSteelStandard() {
            axios.post('/api/steel_grade/steel_standard', {
                steel_grade_id: this.$route.params.id,
                title: this.title,
            }).then(res => {
                this.title = ''
            })
        },

        getSteelGrade() {
            axios.get(`/api/steel_grade/${this.$route.params.id}`).
            then(res => {
                this.steel_grade = res.data.data
            })
        },
    }
}
</script>

<style scoped>

</style>
