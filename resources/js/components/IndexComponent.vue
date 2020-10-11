<template>
<div>
<div class="container">
    <div class="mt-5">
        <div class="card">
            <div class="card-body p-0">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" v-model="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="button" @click="filter">Search</button>
                    </form>
                    <div class="ml-auto">
                        <button type="button" class="btn" :class="{'btn-primary': viewList, 'btn-outline-primary': !viewList}" @click="viewList = true">
                            <svg class="bi" width="1rem" height="1rem" fill="currentColor">
                                <use xlink:href="img/bootstrap-icons.svg#list"/>
                            </svg>
                        </button>
                        <button type="button" class="btn" :class="{'btn-primary': !viewList, 'btn-outline-primary': viewList}" @click="viewList = false">
                            <svg class="bi" width="1rem" height="1rem" fill="currentColor">
                                <use xlink:href="img/bootstrap-icons.svg#grid-fill"/>
                            </svg>
                        </button>
                    </div>
                </nav>
                <transition name="fade">
                <list-component v-if="viewList" :data="movies"></list-component>
                </transition>
                <transition name="fade">
                <grid-component v-if="!viewList" :data="movies"></grid-component>
                </transition>
                <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item" v-bind:class="{disabled: currentPage === 1}">
                            <a class="page-link" @click="currentPage = currentPage - 1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" v-if="currentPage - 2 > 0" @click="currentPage = currentPage - 2">{{currentPage - 2}}</a></li>
                        <li class="page-item"><a class="page-link" v-if="currentPage - 1 > 0" @click="currentPage = currentPage - 1">{{currentPage - 1}}</a></li>
                        <li class="page-item disabled"><a class="page-link">{{currentPage}}</a></li>
                        <li class="page-item"><a class="page-link" v-if="currentPage + 1 < maxPages" @click="currentPage = currentPage + 1">{{currentPage + 1}}</a></li>
                        <li class="page-item"><a class="page-link" v-if="currentPage + 2 < maxPages" @click="currentPage = currentPage + 2">{{currentPage + 2}}</a></li>
                        <li class="page-item" v-bind:class="{disabled: currentPage === maxPages}">
                            <a class="page-link" @click="currentPage = currentPage + 1">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
import ListComponent from "./ListComponent";
import GridComponent from "./GridComponent";
import movie from "../service/MoviesService.ts";
export default {
    name: "IndexComponent",
    components: {GridComponent, ListComponent},
    data: function(){
        return {
            movies: [],
            viewList: true,
            page: 1,
            maxPages: 1,
            search: ''
        }
    },
    computed: {
        currentPage: {
            get: function() {
                return this.page;
            },
            set: function(val) {
                if(val < 1 || val > this.maxPages)
                    return;
                this.page = val;
                this.getMovies(this.page, this.search);
            }
        }
    },
    methods: {
        getMovies: function (page, search) {
            movie.getMovies(page, search).then(result => {
                this.movies = result.data.data;
                this.maxPages = result.data.total_pages;
            });
        },
        filter: function () {
            this.currentPage = 1;
        }
    },
    mounted() {
        this.getMovies(this.page, this.search)
    },
    created() {
        this.$store.dispatch('fetchGenres');
    }
}
</script>

<style scoped>

</style>
