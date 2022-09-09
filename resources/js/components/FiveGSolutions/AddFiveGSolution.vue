<template>
    <div class="topOfThePage">
        <h3>Add 5G Solution</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addSolution">
                    <div class="form-group">
                        <label>Sensor 1</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.number_of_5g_sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Sensor 2</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.number_of_5g_sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Sensor 3</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.sensors_type_c">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="fiveGSolution.number_of_5g_sensors_type_c">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add Solution</button>
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
    methods: {
        addSolution() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/fiveGSolutions/add', this.fiveGSolution)
                    .then(response => {
                        this.$router.push({name: 'fiveGSolutions'})
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
