<template>
    <div class="col-12 col-md-6 col-lg-4 mt-4">
            <div class="card mb-3">
                <img :src="'https://image.tmdb.org/t/p/w300' + item.poster" class="card-img-top" alt="poster">
                <div class="card-body">
                    <h5 class="card-title">{{ item.name }}</h5>
                    <p class="card-text">{{ item.overview }}</p>
                    <p class="card-text">{{ item.release_date }}</p>
                    <router-link :to="'/details/' + item.id"class="btn btn-primary">
                        Ver detalhes
                    </router-link>
                </div>
            </div>
    </div>
</template>

<script>
export default {
    name: "CardComponent",
    props: ['item']
}
</script>

<style scoped>
</style>
