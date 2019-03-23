<template>
    <div class="column has-text-centered">
        <a :href="frequentItem.url" class="has-text-grey">
            <i class="fa-4x" :class="frequentItem.icon"></i>
        </a>
    </div>
</template>

<script>
export default {
    name: "FrequentItem",
    props: {
        frequentItem: Object
    }
};
</script>

<style scoped>
</style>
