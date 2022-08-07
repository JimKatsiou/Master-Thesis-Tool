<template>
    <div>
        <h4 class="text-center">All Scenarios</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Type of System</th>
                <th>Technology</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="scenario in scenarios" :key="scenario.id">
                <td>{{ scenario.id }}</td>
                <td>{{ scenario.type_of_system }}</td>
                <td>{{ scenario.technology }}</td>
                <td>{{ scenario.dscription }}</td>
                <td>{{ scenario.created_at }}</td>
                <td>{{ scenario.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editscenario', params: { id: scenario.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteScenario(scenario.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/scenarios/add')">Add Scenario</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            scenarios: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/scenarios')
                .then(response => {
                    this.scenarios = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteScenario(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/scenarios/delete/${id}`)
                    .then(response => {
                        let i = this.scenarios.map(item => item.id).indexOf(id); // find index of your object
                        this.scenarios.splice(i, 1)
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
