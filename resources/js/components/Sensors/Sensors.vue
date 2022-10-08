<template>
    <div class="topOfThePage">
        <h3>All Sensors</h3>
    </div>
    <div class="nextOfSideBar">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Technology</th>
                <th>Cost</th>
                <th>Installation cost</th>
                <th>Description</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="sensor in sensors" :key="sensor.id">
                <td>{{ sensor.id }}</td>
                <td>{{ sensor.name }}</td>
                <td>{{ sensor.technology_name }}</td>
                <td>{{ sensor.cost }}</td>
                <td>{{ sensor.installation_cost }}</td>
                <td>{{ sensor.description }}</td>
                <td>{{ sensor.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editsensor', params: { id: sensor.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteScenario(sensor.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/sensors/add')">Add Sensor</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sensors: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/sensors')
                .then(response => {
                    this.sensors = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteScenario(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/sensors/delete/${id}`)
                    .then(response => {
                        let i = this.sensors.map(item => item.id).indexOf(id); // find index of your object
                        this.sensors.splice(i, 1)
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
