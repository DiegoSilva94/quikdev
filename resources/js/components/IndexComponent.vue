<template>
<div>
<div class="container">
    <div class="mt-5">
        <div class="card">
            <div class="card-body p-0">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
                <list-component v-if="viewList"></list-component>
                </transition>
                <transition name="fade">
                <grid-component v-if="!viewList"></grid-component>
                </transition>
                <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
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
export default {
    name: "IndexComponent",
    components: {GridComponent, ListComponent},
    data: function(){
        return {
            viewList: true
        }
    }
}
</script>

<style scoped>

</style>
