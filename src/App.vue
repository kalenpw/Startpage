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

/**************
 * SCROLL BAR *
 **************/
::-webkit-scrollbar {
    width: 12px;
    background:#222;
}

/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: rgba(15,15,15,0.8); 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: rgba(15,15,15,0.4); 
}

</style>
