<template>
    <section :class="colorScheme" class="hero is-bold is-fullheight">
        <div class="hero-head">
            <!-- <InfoBar></InfoBar> -->
            <FrequentList></FrequentList>
            <QuickList></QuickList>
        </div>
        <div class="hero-body"></div>
    </section>
</template>

<script>
import FrequentList from "@/components/frequent/FrequentList.vue";
import InfoBar from "@/components/infobar/InfoBar.vue";
import QuickList from "@/components/quick/QuickList.vue";

export default {
    name: "Base",
    components: {
        FrequentList,
        InfoBar,
        QuickList,
    },
    computed: {
        colorScheme: () => {
            if (
                window.matchMedia &&
                window.matchMedia("(prefers-color-scheme: dark)").matches
            ) {
                return "is-dark";
            }
            return "is-light";
        },
    },
    props: {},
};
</script>

<style scoped>
</style>
