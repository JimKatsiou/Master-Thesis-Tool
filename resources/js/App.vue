<template>
    <div id="app">
        <nav-bar />
        <router-view />
    </div>

</template>

<script>
import NavBar from './components/NavBar.vue'
import FooterBar from './components/FooterBar.vue'

export default {
    name: "App",
    components: {
        NavBar,
        FooterBar,
    },
    data() {
        return {
        }
    },
    created() {

    },
    methods: {

    },
}
</script>
