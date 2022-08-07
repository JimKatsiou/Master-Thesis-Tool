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
                    <router-link to="/scenarios" class="list-group-item list-group-item-action py-2 ripple">Scenarios</router-link>
                    <router-link to="/testing-matlab" class="list-group-item list-group-item-action py-2 ripple">Testing - Matlab</router-link>
                    <hr>
                    <router-link to="/charts" class="list-group-item list-group-item-action py-2 ripple">Charts</router-link>
                    <router-link to="/tables" class="list-group-item list-group-item-action py-2 ripple">Tables</router-link>
                    <hr>
                    <router-link to="/documentation" class="list-group-item list-group-item-action py-2 ripple">Documentaion</router-link>
                    <router-link to="/" class="list-group-item list-group-item-action py-2 ripple">Somethink else</router-link>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><span>Calendar</span> </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><span>Users</span></a>
                     <a class="list-group-item list-group-item-action py-2 ripple" style="cursor: pointer;" @click="logout">Logout</a>
                </div>
            </div>
            <!-- for non-logged user-->
            <div class="side-bar" v-else>
                <div class="list-group list-group-flush mx-3 mt-4">
                    <router-link to="/" class="list-group-item list-group-item-action py-2 ripple active">Home</router-link>
                    <router-link to="/login" class="list-group-item list-group-item-action py-2 ripple">Login</router-link>
                    <router-link to="/register" class="list-group-item list-group-item-action py-2 ripple">Register</router-link>
                    <router-link to="/about" class="list-group-item list-group-item-action py-2 ripple">About</router-link>
                </div>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
        <!-- Toggle button -->
        <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="MasterThesis/imges/general/logo.png">
        </a>


        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row"  v-if="isLoggedIn">
            <!-- Notification dropdown -->
            <li class="nav-item dropdown">
            <a
                class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
                >
                <i class="fas fa-bell"></i>
                <span class="badge rounded-pill badge-notification bg-danger"
                    >1</span
                >
            </a>
            <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuLink"
                >
                <li><a class="dropdown-item" href="#">Some news</a></li>
                <li><a class="dropdown-item" href="#">Another news</a></li>
                <li>
                <a class="dropdown-item" href="#">Something else here</a>
                </li>
            </ul>
            </li>

            <!-- Icon -->
            <li class="nav-item">
            <a class="nav-link me-3 me-lg-0" href="#">
                <i class="fas fa-fill-drip"></i>
            </a>
            </li>
            <!-- Icon -->
            <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#">
                <i class="fab fa-github"></i>
            </a>
            </li>

            <!-- Avatar -->
            <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
                >
                <img
                    src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                    class="rounded-circle"
                    height="22"
                    alt=""
                    loading="lazy"
                    />
            </a>
            <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuLink"
                >
                <li><a class="dropdown-item" href="#">My profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
            </li>
        </ul>
        </div>
        <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">

  </div>
</main>
<!--Main layout-->


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
    height: 100%; /* Full-height: remove this if you want "auto" height */
    width: 240px; /* Set the width of the sidebar */
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    top: 0; /* Stay at the top */
    bottom: 0;
    left: 0;
    padding: 58px 0 0; /* Height of navbar */
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

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
</style>

