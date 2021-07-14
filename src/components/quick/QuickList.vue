<template>
    <div class="section columns">
        <QuickItem category="Japanese" :items="japaneseLinks"></QuickItem>
        <QuickItem category="Torrent" :items="torrentLinks"></QuickItem>
        <QuickItem category="Money" :items="moneyLinks"></QuickItem>
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
        this.torrentLinks = quickLinkList.filter(link => link.category == "Torrent");
        this.miscLinks = quickLinkList.filter(link => link.category === "Misc");
        this.japaneseLinks = quickLinkList.filter(link => link.category === "Japanese");
        this.moneyLinks = quickLinkList.filter(link => link.category === "Money");
    },
    data(){
        return{
            japaneseLinks:[],
            torrentLinks: [],
            miscLinks: [],
            moneyLinks: [],
        }
    }
};
</script>
