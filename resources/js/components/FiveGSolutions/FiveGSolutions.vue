<template>
    <div class="topOfThePage">
        <h3>All 5G Solutions</h3>
    </div>
    <div class="nextOfSideBar">
        <button type="button" class="btn btn-info" @click="this.$router.push('/fiveGSolutions/add')">Add Solution</button>
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
            <tr v-for="fiveGSolution in fiveGSolutions" :key="fiveGSolution.id">
                <td>{{ fiveGSolution.id }}</td>
                <td>{{ fiveGSolution.five_g_sensors_type_a }}</td>
                <td>{{ fiveGSolution.number_of_5g_sensors_type_a }}</td>
                <td>{{ fiveGSolution.five_g_sensors_type_b }}</td>
                <td>{{ fiveGSolution.number_of_5g_sensors_type_b }}</td>
                <td>{{ fiveGSolution.five_g_sensors_type_c }}</td>
                <td>{{ fiveGSolution.number_of_5g_sensors_type_c }}</td>
                <td>{{ fiveGSolution.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editfiveGSolution', params: { id: fiveGSolution.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteSolution(fiveGSolution.id)">Delete</button>
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
            fiveGSolutions: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/fiveGSolutions')
                .then(response => {
                    this.fiveGSolutions = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteSolution(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/fiveGSolutions/delete/${id}`)
                    .then(response => {
                        let i = this.fiveGSolutions.map(item => item.id).indexOf(id); // find index of your object
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
