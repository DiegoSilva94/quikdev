<template >
    <div>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <router-link to="/" class="navbar-brand">Voltar</router-link>
            </div>
        </nav>
        <div v-if="movie !== null">
            <div v-bind:style="{
                'background-image': 'url(\'https://image.tmdb.org/t/p/original' + movie.backdrop + '\')',
                'background-size': 'cover',
                'background-repeat': 'no-repeat'
            }" style="background-position: center">
                <div class="box-top">
                    <div class="container">
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <img :src="'https://image.tmdb.org/t/p/w300' + movie.poster" class="img-fluid"/>
                                </div>
                                <div class="col-12 col-md-8 text-white">
                                    <h2><b>{{ movie.name }}</b> <small>({{ movie.release_date.substr(0,4) }})</small></h2>
                                    <p>
                                        <span class="badge" :class="{'badge-success': movie.vote_average > 7, 'badge-warning': movie.vote_average <=7 && movie.vote_average >= 4, 'badge-danger': movie.vote_average < 4 }">{{ movie.vote_average }}</span>
                                        - {{ movie.release_date }}
                                        -
                                        <template v-for="(genre,index) in movie.genres">
                                            <span v-if="getGenreById(genre.id).name !== undefined">{{ getGenreById(genre.id).name }}<template v-if="index < movie.genres.length-1">,&nbsp;</template></span>
                                        </template>
                                    </p>
                                    <p>{{ movie.tagline }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container infos">
                <h3>Overview</h3>
                <p>{{ movie.overview }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import movie from "../service/MoviesService.ts";

export default {
    data: function () {
        return {
            data: null,
        }
    },
    computed: {
        movie: function () {
            return this.data;
        }
    },
    name: "DetailsComponent",
    methods: {
        getGenreById: function(id) {
            return this.$store.getters.getGenreById(id) || {};
        },
        loadMovie: function () {
            movie.getMovie(this.$route.params.id).then(result => {
                this.data = result.data.data;
            });
        }
    },
    mounted: function() {
        this.loadMovie();
    },
    created() {
        this.$store.dispatch('fetchGenres');
    }
}
</script>

<style scoped>
p {
    font-size: 1rem;
    line-height: 1.25rem;
}
.box-top {
    width: 100%;
    background: rgba(23,23,23,0.87);
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}
.infos {
    padding-top: 1.5rem;
}
.infos h3 {
    font-weight: 700;
}
.infos p {
    color: #373737;
}
</style>
