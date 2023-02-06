<template>

<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
             <!-- for logged-in user-->
             <div class="side-bar" v-if="isLoggedIn">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <router-link to="/dashboard" class="list-group-item list-group-item-action py-2 ripple active">Dashboard</router-link>
                    <hr>
                    <router-link to="/type_of_systems" class="list-group-item list-group-item-action py-2 ripple">Type of systems</router-link>
                    <router-link to="/technologies" class="list-group-item list-group-item-action py-2 ripple">Technologies</router-link>
                    <router-link to="/sensors" class="list-group-item list-group-item-action py-2 ripple">Sensors</router-link>
                    <router-link to="/gateways" class="list-group-item list-group-item-action py-2 ripple">Gateways</router-link>
                    <router-link to="/scenarios" class="list-group-item list-group-item-action py-2 ripple">Scenarios</router-link>
                    <hr>
                    <router-link to="/fiveGSolutions" class="list-group-item list-group-item-action py-2 ripple">5G Solutions</router-link>
                    <router-link to="/loraSolutions" class="list-group-item list-group-item-action py-2 ripple">LoRa Solutions</router-link>
                    <router-link to="/nbSolutions" class="list-group-item list-group-item-action py-2 ripple">NB-IoT Solutions</router-link>
                    <hr>
                    <router-link to="/testing-matlab" class="list-group-item list-group-item-action py-2 ripple">Testing - Matlab</router-link>
                    <hr>
                    <router-link to="/charts" class="list-group-item list-group-item-action py-2 ripple">Charts</router-link>
                    <router-link to="/tables" class="list-group-item list-group-item-action py-2 ripple">Tables</router-link>
                    <hr>
                    <router-link to="/documentation" class="list-group-item list-group-item-action py-2 ripple">Documentaion</router-link>
                    <router-link to="/" class="list-group-item list-group-item-action py-2 ripple">Somethink else</router-link>
                    <hr>
                    <a class="list-group-item list-group-item-action py-2 ripple" style="cursor: pointer;" @click="logout">Logout</a>
                </div>
            </div>
            <!-- for non-logged user-->
            <div class="side-bar" v-else>
                <div class="list-group list-group-flush mx-3 mt-4">
                    <router-link to="/" class="list-group-item list-group-item-action py-2 ripple active">Home</router-link>
                    <router-link to="/login" class="list-group-item list-group-item-action py-2 ripple">Login</router-link>
                    <router-link to="/register" class="list-group-item list-group-item-action py-2 ripple">Register</router-link>
                    <!-- <router-link to="/about" class="list-group-item list-group-item-action py-2 ripple">About</router-link> -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
</header>
<!--Main Navigation-->

<!-- Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">

  </div>
</main>
<!--Main layout -->


</template>

<script>
import { mapStateTwoWay } from 'vuex-map-state';

export default ({
    name: 'NavBar',
    components: {
        mapStateTwoWay,

    },
    data () {
        return {
             isLoggedIn: false,
        }
    },

    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },

    mounted() {

    },

    computed: {

    },

    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }

    },
})
</script>

<style>
 body {
  background-color: #fbfbfb;
}
@media (min-width: 991.98px) {
  main {
    padding-left: 240px;
  }
}

/* Sidebar */
.sidebar {
    height: 100%;  /* Full-height: remove this if you want "auto" height */
    width: 250px; /* Set the width of the sidebar */
    position: absolute;
    top: 0; /* Stay at the top */
    bottom: 0;
    left: 0;
    padding: 10px 0 0; /* Height of navbar */
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
    z-index: 1;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
.sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}


</style>

