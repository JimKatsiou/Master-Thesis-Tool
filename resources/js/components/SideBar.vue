<template>
   <nav  id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="collapse navbar-collapse">
            <!-- for logged-in user-->
            <div class="side-bar" v-if="isLoggedIn">
                <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                <hr>
                    <router-link to="/books" class="nav-item nav-link">Books X</router-link>
                    <router-link to="/books" class="nav-item nav-link">Scenarios</router-link>
                    <router-link to="/books" class="nav-item nav-link">Testing</router-link>
                    <router-link to="/books" class="nav-item nav-link">Gharts</router-link>
                    <router-link to="/books" class="nav-item nav-link">Tables</router-link>
                    <router-link to="/books" class="nav-item nav-link">Documention</router-link>
                    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
                </div>
                <!-- for non-logged user-->
                <div class="side-bar" v-else>
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/login" class="nav-item nav-link">Login</router-link>
                    <router-link to="/register" class="nav-item nav-link">Register</router-link>
                    <router-link to="/about" class="nav-item nav-link">About</router-link>
                </div>
        </div>
    </nav>
</template>

<script>

export default ({
    name: 'SideBar',
    components: {

    },
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
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

<style scoped>

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 240px;
  z-index: 600;
}
</style>

