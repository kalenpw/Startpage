<template>
    <div class="column has-text-centered">
        <a :href="frequentItem.url" class="has-text-grey">
            <i class="fa-4x" :class="frequentItem.icon"></i>
            {{frequentItem.hotkey}}
        </a>
    </div>
</template>

<script>
import EventBus from "@/eventbus.js";

export default {
    name: "FrequentItem",
    props: {
        frequentItem: Object
    },
    created(){
        EventBus.$on("keypress", event =>{
            if(event.key == this.frequentItem.hotkey){
                window.location.href = this.frequentItem.url;
            }
        });
    }
};
</script>

<style scoped>
</style>
