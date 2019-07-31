<template>
    <div id="app">
        <select id="category" name="category" class="form-control text-md-right">
            <option v-for="i in categories">{{ i.category }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "CategoryAssigner",
        methods: {

        },
        data() {
            return {
                categories: [
                    {category: 'Politics'},
                    {category: 'Economy'},
                    {category: 'Health'},
                    {category: 'Tech'},
                    {category: 'Sports'},
                    {category: 'Lifestyle'}
                ],
                categorySelected: 'Politics'
            }
        },
        mounted() {
            console.log( '[Vue.js] :: [CategoryAssigner] - mounted.' );
        }
    }
</script>

<style scoped>

</style>
