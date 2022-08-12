<template>
    <div class="topOfThePage">
        <h3>Add Technology</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addTechnology">
                    <div class="form-group">
                        <label>Technology Name</label>
                        <input type="text" class="form-control" v-model="technolgy.name">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add Technology</button>
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
            technolgy: {}
        }
    },
    methods: {
        addTechnology() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/technologies/add', this.technolgy)
                    .then(response => {
                        this.$router.push({name: 'technologies'})
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
