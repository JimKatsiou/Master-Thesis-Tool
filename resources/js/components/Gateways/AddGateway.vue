<template>
    <div class="topOfThePage">
        <h3>Add Gateway</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addScenario">
                    <div class="form-group">
                        <label>Type of System</label>
                        <input type="text" class="form-control" v-model="gateway.name">
                    </div>
                    <div class="form-group">
                        <label>Technology</label>
                        <input type="text" class="form-control" v-model="gateway.technology_id">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="gateway.description">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add Gateway</button>
                    <router-link to="/scenarios" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            gateway: {}
        }
    },
    methods: {
        addScenario() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/gateways/add', this.gateway)
                    .then(response => {
                        this.$router.push({name: 'gateways'})
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
