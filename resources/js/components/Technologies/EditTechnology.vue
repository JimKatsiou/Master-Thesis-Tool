<template>
    <div class="topOfThePage">
        <h3>Edit Technology</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6" v-if="technology">
                <form @submit.prevent="updateScenario">
                    <div class="form-group">
                        <label>Technology Name</label>
                        <input type="text" class="form-control" v-model="technology.name">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update technology</button>
                    <router-link to="/technologies" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            technology: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/technologies/edit/${this.$route.params.id}`)
                .then(response => {
                    this.technology = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateScenario() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/technologies/update/${this.$route.params.id}`, this.technology)
                    .then(response => {
                        this.$router.push({name: 'technologies'});
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>

<style>
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
