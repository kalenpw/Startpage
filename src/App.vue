<template>
    <div id="app">
        <Root></Root>
    </div>
</template>

<script>
import Root from "@/components/Root.vue";
export default {
    name: "app",
    components: {
        Root
    }
};
</script>

<style>
#app {
    font-family: "Avenir", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
