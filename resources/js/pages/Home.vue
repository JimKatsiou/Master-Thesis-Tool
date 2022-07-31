<template>
    <div class="main">
        <h2>Reporting and IoT Network Management</h2>

        <img :src="getHomePageImage()" class="img-fluid" alt="...">

    </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            //
        }
    },
    created() {
    },
    methods: {
        getHomePageImage(){
            return "images/logo.png/"
        }
    }
}
</script>

<style scoped>

.main {
  margin-left: 10px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

</style>

