<template>
    <div class="topOfThePage">
        <h3>All Lora Solutions</h3>
    </div>
    <div class="nextOfSideBar">
        <button type="button" class="btn btn-info" @click="this.$router.push('/loraSolutions/add')">Add Solution</button>
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
                <th>Gateways 1</th>
                <th>Number of gateway</th>
                <th>Gateways 2</th>
                <th>Number of gateway</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="loraSolution in loraSolutions" :key="loraSolution.id">
                <td>{{ loraSolution.id }}</td>
                <td>{{ loraSolution.lora_sensors_type_a }}</td>
                <td>{{ loraSolution.number_of_lora_sensors_type_a }}</td>
                <td>{{ loraSolution.lora_sensors_type_b }}</td>
                <td>{{ loraSolution.number_of_lora_sensors_type_b }}</td>
                <td>{{ loraSolution.lora_sensors_type_c }}</td>
                <td>{{ loraSolution.number_of_lora_sensors_type_c }}</td>
                <td>{{ loraSolution.gateways_type_a }}</td>
                <td>{{ loraSolution.number_of_lora_gateways_type_a }}</td>
                <td>{{ loraSolution.gateways_type_b }}</td>
                <td>{{ loraSolution.number_of_lora_gateways_type_b }}</td>
                <td>{{ loraSolution.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editloraSolutions', params: { id: loraSolution.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteSolution(loraSolution.id)">Delete</button>
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
            loraSolutions: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/loraSolutions')
                .then(response => {
                    this.loraSolutions = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteSolution(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/loraSolutions/delete/${id}`)
                    .then(response => {
                        let i = this.loraSolutions.map(item => item.id).indexOf(id); // find index of your object
                        this.loraSolutions.splice(i, 1)
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
