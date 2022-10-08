<template>
    <div id="app">
        <nav-bar />
        <router-view />
    </div>

</template>

<script>
import NavBar from './components/NavBar.vue'
import FooterBar from './components/FooterBar.vue'
import vSelect from 'vue-select'

export default {
    name: "App",
    components: {
        NavBar,
        FooterBar,
        vSelect,
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
