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
import Chart from 'chart.js/auto';
import Datepicker from 'vue3-datepicker'
import Toaster from 'v-toaster';


export default {
    name: "App",
    components: {
        NavBar,
        FooterBar,
        vSelect,
        Chart,
        Datepicker,
        Toaster,

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
