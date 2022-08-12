<template>
    <div class="topOfThePage">
        <h3>Edit Scenarios</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6" v-if="scenario">
                <form @submit.prevent="updateScenario">
                    <div class="form-group">
                        <label>Type of System</label>
                        <input type="text" class="form-control" v-model="scenario.type_of_system_name">
                    </div>
                    <div class="form-group">
                        <label>Technology</label>
                        <input type="text" class="form-control" v-model="scenario.technology_name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="scenario.description">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Scenario</button>
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
            scenario: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/scenarios/edit/${this.$route.params.id}`)
                .then(response => {
                    this.scenario = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateScenario() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/scenarios/update/${this.$route.params.id}`, this.scenario)
                    .then(response => {
                        this.$router.push({name: 'scenarios'});
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
