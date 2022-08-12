<template>
    <div class="topOfThePage">
        <h3>Add Type of system</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addSystem">
                    <div class="form-group">
                        <label>Type of System</label>
                        <input type="text" class="form-control" v-model="type_of_system.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="type_of_system.description">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add System</button>
                    <router-link to="/type_of_systems" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            type_of_system: {}
        }
    },
    methods: {
        addSystem() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/type_of_systems/add', this.type_of_system)
                    .then(response => {
                        this.$router.push({name: 'typeOfSystem'})
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
