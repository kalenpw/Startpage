<template>
    <div class="section columns">
        <QuickItem category="Hospital" :items="hospitalLinks"></QuickItem>
        <QuickItem category="Work" :items="workLinks"></QuickItem>
        <QuickItem category="Torrent" :items="torrentLinks"></QuickItem>
        <QuickItem category="Misc" :items="miscLinks"></QuickItem>
    </div>
</template>

<script>
import QuickItem from "@/components/quick/QuickItem.vue";
import quickLinkList from "@/data/QuickLinks.js";
// import {alphabeticalSort} from "@/utils/sort.js";
export default {
    name: "QuickList",
    components:{
        QuickItem
    },
    mounted(){
        // this.schoolArray = quickLinkList.filter(link => link.category == "School");
        this.workLinks = quickLinkList.filter(link => link.category == "Work");
        this.torrentLinks = quickLinkList.filter(link => link.category == "Torrent");
        this.miscLinks = quickLinkList.filter(link => link.category === "Misc");
        this.hospitalLinks = quickLinkList.filter(link => link.category === "Hospital");
    },
    data(){
        return{
            // schoolArray: [],
            workLinks: [],
            torrentLinks: [],
            miscLinks: [],
            hospitalLinks: []
        }
    }
};
</script>
