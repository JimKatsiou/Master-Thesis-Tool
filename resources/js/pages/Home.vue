<template>
     <div class="nextOfSideBar">
        <div class="main">
            <!-- Background image -->
            <div id="intro" class="bg-image shadow-2-strong">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
                    <div class="container d-flex align-items-center justify-content-center text-center h-300">
                        <div class="text-white">
                            <h1 class="mb-3">Reporting and IoT Network Management</h1>
                            <br>
                            <!-- <h5 class="mb-4">Some Text</h5> --> <!-- // TODO: ΝΑ ΒΑΛΩ ΚΑΠΟΙΟ ΤΕΧΤ -->
                            <router-link to="/login" class="btn btn-secondary btn-lg">Lets go</router-link>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
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

#intro
    {
        background-image: url("https://ciobusinessreview.com/wp-content/uploads/2022/01/2-750x430.jpg");
    }
    /* Height for devices larger than 576px */
    @media (min-width: 992px) {
        #intro
        {
            margin-top: -58.59px;
        }
    }
    .navbar .nav-link {
        color: #fff !important;
    }

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

