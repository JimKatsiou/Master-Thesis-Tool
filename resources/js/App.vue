<template>
    <div id="app">
        <div class="container">
            <div class="text-center" style="margin: 20px 0px 20px 0px;">
                <!-- <a href="/"><img src="{{ asset('/public/images/iot.png') }}"></a><br> -->
                <span class="text-secondary">Reporting Tool</span>
            </div>
            <nav-bar />
            <router-view />
            <footer-bar />
        </div>
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
        menu
    },
    data() {
        return {
            menu
        }
    },
    created() {

    },
    methods: {

    },
}
</script>
