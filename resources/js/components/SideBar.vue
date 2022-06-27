<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

