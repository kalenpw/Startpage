<template>
    <div class="section columns">
        <QuickItem category="School" :items="schoolArray"></QuickItem>
        <QuickItem category="Work" :items="workArray"></QuickItem>
        <QuickItem category="Torrent" :items="torrentArray"></QuickItem>
    </div>
</template>

<script>
import QuickItem from "@/components/quick/QuickItem.vue";
import quickLinkList from "@/data/QuickLinks.js";
import {alphabeticalSort} from "@/utils/sort.js";
export default {
    name: "QuickList",
    components:{
        QuickItem
    },
    mounted(){
        this.schoolArray = quickLinkList.filter(link => link.category == "School");
        this.workArray = quickLinkList.filter(link => link.category == "Work");
        this.torrentArray = quickLinkList.filter(link => link.category == "Torrent");
    },
    data(){
        return{
            schoolArray: [],
            workArray: [],
            torrentArray: []
        }
    }

};
</script>
