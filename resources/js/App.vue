<template>
    <div id="app">
        <nav-bar />
        <router-view />
        <!-- <footer-bar /> -->
    </div>

</template>

<script>
import menu from '../menu'
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
