<template>
    <div class="topOfThePage">
        <h3>Edit Nb Solutions</h3>
    </div>
    <div class="nextOfSideBar">
        <div class="row">
            <div class="col-md-6" v-if="nbSolution">
                <form @submit.prevent="updateNbSolutions">
                    <div class="form-group">
                        <label>Sensor 1</label>
                        <input type="text" class="form-control" v-model="nbSolution.nb_sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="nbSolution.number_of_nb_sensors_type_a">
                    </div>
                    <div class="form-group">
                        <label>Sensor 2</label>
                        <input type="text" class="form-control" v-model="nbSolution.nb_sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="nbSolution.number_of_nb_sensors_type_b">
                    </div>
                    <div class="form-group">
                        <label>Sensor 3</label>
                        <input type="text" class="form-control" v-model="nbSolution.nb_sensors_type_c">
                    </div>
                    <div class="form-group">
                        <label>Number of sensors</label>
                        <input type="text" class="form-control" v-model="nbSolution.number_of_nb_sensors_type_c">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Solution</button>
                    <router-link to="/loraSolutions" class="btn btn-secondary">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nbSolution: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/nbSolutions/edit/${this.$route.params.id}`)
                .then(response => {
                    this.nbSolution = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateNbSolutions() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/nbSolutions/update/${this.$route.params.id}`, this.nbSolution)
                    .then(response => {
                        this.$router.push({name: 'nbSolutions'});
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
