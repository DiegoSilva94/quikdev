<template>
<div>
    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">Poster</th>
            <th scope="col">Name</th>
            <th scope="col">Overview</th>
            <th scope="col">Release Date</th>
            <th scope="col">Genre</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in data">
            <td><img :src="'https://image.tmdb.org/t/p/w300' + item.poster" class="list-poster"/></td>
            <td>{{ item.name }}</td>
            <td>{{ item.overview }}</td>
            <td>{{ item.release_date }}</td>
            <td>
                <template v-for="(genre,index) in item.genres">
                    <span v-if="getGenreById(genre).name !== undefined">{{ getGenreById(genre).name }}<template v-if="index < item.genres.length-1">,&nbsp;</template></span>
                </template>
            </td>
            <td>
                <router-link :to="'/details/' + item.id">Details</router-link>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {
    name: "ListComponent",
    props: ['data'],
    methods: {
        getGenreById: function(id) {
            return this.$store.getters.getGenreById(id) || {};
        },
        viewDetails: function(id) {
            this.router.push({
                name: 'details',
                params: {id:id}
            });
        }
    }
}
</script>

<style scoped>
.list-poster {
    width: 100px;
    box-shadow: 1px 1px 3px 1px rgba(0,0,0,0.5);
    border-radius: 3px;
}
</style>
