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
*{
    text-transform: lowercase;
    font-family: Ubuntu, "Helvetica", times, roman, serif;
    letter-spacing: 1px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
