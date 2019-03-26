<template>
    <div>
        <div class="section columns">
            <FrequentItem
                v-for="frequentItem in frequentItems"
                v-bind:key="frequentItem.name"
                :frequentItem="frequentItem"
            ></FrequentItem>
        </div>
    </div>
</template>

<script>
import FrequentItem from "@/components/frequent/FrequentItem.vue";
import frequentItemsData from "@/data/FrequentLinks.js";
import { alphabeticalSort } from "@/utils/sort.js";

export default {
    name: "FrequentList",
    components: {
        FrequentItem
    },
    data() {
        return {
            frequentItems: []
        };
    },
    mounted() {
        this.frequentItems = frequentItemsData.sort(alphabeticalSort);
    }
};
</script>