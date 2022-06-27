<template>
    <div id="app">
        <div class="container">
            <div class="text-center" style="margin: 20px 0px 20px 0px;">
                <!-- <a href="/"><img src="{{ asset('/public/images/iot.png') }}"></a><br> -->
                <span class="text-secondary">Reporting Tool</span>
            </div>
            <nav-bar />
            <side-bar />
            <!-- <side-bar :menu="menu" /> -->
            <hr>
            <router-view />
            <footer-bar />
        </div>
    </div>
</template>

<script>
import menu from '../menu'
import SideBar from './components/SideBar.vue'
import NavBar from './components/NavBar.vue'
import FooterBar from './components/FooterBar.vue'

export default {
    name: "App",
    components: {
        SideBar,
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
