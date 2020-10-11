<template>
<div class="row px-1">
    <template v-for="item in data">
        <card-component :item="item"></card-component>
    </template>
</div>
</template>

<script>
import CardComponent from "./CardComponent";
export default {
    name: "GridComponent",
    components: {CardComponent},
    props: ['data'],
    methods: {
        getGenreById(id) {
            return this.$store.getters.getGenreById(id) || {};
        }
    }
}
</script>

<style scoped>
</style>
