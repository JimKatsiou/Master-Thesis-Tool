<template>
    <div class="nextOfSideBar">
        <div class="main">
            <h2>Reporting and IoT Network Management</h2>
        </div>
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
.nextOfSideBar {
    margin-left: 250px;
    padding: 10px;
}

.topOfThePage
{
    margin-top: -50px;
    background-color: rgba(146, 145, 145, 0.404);
    margin-left: 250px;
    padding: 10px;
}

</style>

