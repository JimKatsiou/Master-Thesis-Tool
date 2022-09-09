<template>
    <div class="topOfThePage">
        <h3>All NB Solutions</h3>
    </div>
    <div class="nextOfSideBar">
        <button type="button" class="btn btn-info" @click="this.$router.push('/nbSolutions/add')">Add Solution</button>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Sensor 1</th>
                <th>Number of sensors</th>
                <th>Sensor 2</th>
                <th>Number of sensors</th>
                <th>Sensor 3</th>
                <th>Number of sensors</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="nbSolution in nbSolutions" :key="nbSolution.id">
                <td>{{ nbSolution.id }}</td>
                <td>{{ nbSolution.nb_sensors_type_a }}</td>
                <td>{{ nbSolution.number_of_nb_sensors_type_a }}</td>
                <td>{{ nbSolution.nb_sensors_type_b }}</td>
                <td>{{ nbSolution.number_of_nb_sensors_type_b }}</td>
                <td>{{ nbSolution.nb_sensors_type_c }}</td>
                <td>{{ nbSolution.number_of_nb_sensors_type_c }}</td>
                <td>{{ nbSolution.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editnbSolution', params: { id: nbSolution.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteSolution(nbSolution.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {
    data() {
        return {
            nbSolutions: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/nbSolutions')
                .then(response => {
                    this.nbSolutions = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteSolution(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/nbSolutions/delete/${id}`)
                    .then(response => {
                        let i = this.nbSolutions.map(item => item.id).indexOf(id); // find index of your object
                        this.fiveGSolutions.splice(i, 1)
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
