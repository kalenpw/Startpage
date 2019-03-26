<template>
    <div class="column">
        <header class="card-header" @click="toggleLinks">
            <h2 class="title has-text-grey">{{category}}</h2>
        </header>
        <div v-if="showLinks" class="list is-hoverable has-text-grey">
            <a v-for="item in items" v-bind:key="item.name" :href="item.url" class="list-item">{{item.name}}</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "QuickItem.vue",
    props:{
        category: String,
        items: Array
    },
    data(){
        return{
            showLinks: true
        }
    },
    methods:{
        toggleLinks(){
            this.showLinks = !this.showLinks;
        }
    }
}
</script>

<style scoped>
.list{
    background-color: #222;
}
.list-item{
    background-color: #222;
    border: none;
}
.list-item:hover{
    background-color: #111;
}
</style>
