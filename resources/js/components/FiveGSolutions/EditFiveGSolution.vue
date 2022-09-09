<template>
    <div class="topOfThePage">
        <h3>Edit 5G Solutions</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6" v-if="fiveGSolution">
                <form @submit.prevent="updateFiveGSolution">
                    <div class="form-group">
                        <label>Sensor 1</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.five_g_sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.number_of_5g_sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Sensor 2</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.five_g_sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.number_of_5g_sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Sensor 3</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.five_g_sensors_type_c">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.number_of_5g_sensors_type_c">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Solution</button>
                    <router-link to="/fiveGSolutions" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fiveGSolution: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/fiveGSolutions/edit/${this.$route.params.id}`)
                .then(response => {
                    this.fiveGSolution = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateFiveGSolution() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/fiveGSolutions/update/${this.$route.params.id}`, this.fiveGSolution)
                    .then(response => {
                        this.$router.push({name: 'fiveGSolutions'});
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
